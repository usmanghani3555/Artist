<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
/** Paypal Details classes **/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use DB;

/**
 ** We declare the Api context as above and initialize it in the contructor
 **/
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    private $api_context;
    private $confirmuser;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->api_context = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret'))
        );
        $this->api_context->setConfig(config('paypal.settings'));

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string'],
            'members_details' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        if($data['booking'] == 'free_booking'){

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
                'insta_name' => $data['insta_name'],
                'members_details' => $data['members_details'],
                'booking_type' => $data['booking'],
                'agent' => $data['agent'] ? $data['agent'] : "",
                'amount' => $data['amount'],
                'coins' => 0,
            ]);
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
                'insta_name' => $data['insta_name'],
                'members_details' => $data['members_details'],
                'booking_type' => $data['booking'],
                'agent' => $data['agent'] ? $data['agent'] : "",
                'amount' => $data['amount'],
                'coins' => 50,
            ]);
        }
    }
    protected function creates(array $data)
    {
        return DB::table('subscription')->insert([
            'booking_type' => $data['booking'],
            'amount' => $data['amount'],
        ]);
    }

    public function register(Request $request)
    {       //dd($request);
        //$agntid = User::where('id',$request->agent);

        $this->validator($request->all())->validate();
        //  $this->confirmuser = $this->create($request->all());
        $this->confirmuser = $request->all();
        $request->session()->put('users', $this->confirmuser);
        //event(new Registered($this->confirmuser));
        //$this->guard()->login($user);
        $pay_amount = $request->amount;
        if($pay_amount > 0) {
            // We create the payer and set payment method, could be any of "credit_card", "bank", "paypal", "pay_upon_invoice", "carrier", "alternate_payment".
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            // Create and setup items being paid for.. Could multiple items like: 'item1, item2 etc'.
            $item = new Item();
            $item->setName('Paypal Payment')->setCurrency('USD')->setQuantity(1)->setPrice($pay_amount);
            // Create item list and set array of items for the item list.
            $itemList = new ItemList();
            $itemList->setItems(array($item));
            // Create and setup the total amount.
            $amount = new Amount();
            $amount->setCurrency('USD')->setTotal($pay_amount);
            // Create a transaction and amount and description.
            $transaction = new Transaction();
            $transaction->setAmount($amount)->setItemList($itemList)
                ->setDescription('Laravel Paypal Payment Tutorial');
            //You can set custom data with '->setCustom($data)' or put it in a session.
            // Create a redirect urls, cancel url brings us back to current page, return url takes us to confirm payment.
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('confirm-payment'))
                ->setCancelUrl(url()->current());
            // We set up the payment with the payer, urls and transactions.
            // Note: you can have different itemLists, then different transactions for it.
            $payment = new Payment();
            $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            // Put the payment creation in try and catch in case of exceptions.
            try {
                $payment->create($this->api_context);
            } catch (PayPalConnectionException $ex) {
                return back()->withError('Some error occur, sorry for inconvenient');
            } catch (Exception $ex) {
                return back()->withError('Some error occur, sorry for inconvenient');
            }
            // We get 'approval_url' a paypal url to go to for payments.
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            // You can set a custom data in a session
            // We redirect to paypal tp make payment
            if (isset($redirect_url)) {
                return redirect($redirect_url);
            }
            //$this->confirmuser = $user;
            return $this->registered($request, $this->confirmuser)
                ?: redirect($this->redirectPath());
        }else{
            $user = $this->create($this->confirmuser);
            if(!empty($request->agent)){
            $old = DB::table('users')->where('id',$request->agent)->first()->assign_artists;
        }else{
            $old = "";
        }
            $lastinsertedid = $user['id'];
            $new = $old .",".$lastinsertedid;
            if(!empty($request->agent) && $request->agent != "0"){
                DB::table('users')
                    ->where('id',$request->agent)
                    ->update([
                        'assign_artists' => $new,

                    ]);
            }
            $this->guard()->login($user);
            return redirect('/home')->withSuccess('You have registered successfully');
           // return $this->registered($request, $this->confirmuser)
             //   ?: redirect($this->redirectPath());
        }
    }

    public function confirmPayment(Request $request)
    {
        // If query data not available... no payments was made.
        if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
            return redirect('/checkout')->withError('Payment was not successful.');
        // We retrieve the payment from the paymentId.
        $payment = Payment::get($request->query('paymentId'), $this->api_context);
        // We create a payment execution with the PayerId
        $execution = new PaymentExecution();
        $execution->setPayerId($request->query('PayerID'));
        // Then we execute the payment.
        $result = $payment->execute($execution, $this->api_context);//print_r($_SESSION['users']);exit;
        // Get value store in array and verified data integrity
        // $value = $request->session()->pull('key', 'default');
        // Check if payment is approved
        if ($result->getState() != 'approved')
            return redirect('/register')->withError('Payment was not successful.');
        //$this->guard()->login($this->confirmuser);
        $getagnts = $request->session()->get('users')['agent'];
        $usersss = $this->create($request->session()->get('users'));
        $lastinsertedid = $usersss['id'];

        DB::table('users')
            ->where('id', $lastinsertedid)
            ->update([
                'paymentId' => $request->paymentId,
                'paypaltoken' => $request->token,
                'PayerID' => $request->PayerID
            ]);

        $old = DB::table('users')->where('id',$getagnts)->first()->assign_artists;
        $new = $old .",".$lastinsertedid;
        if(!empty($getagnts)  && $request->agent != "0"){
        DB::table('users')
            ->where('id',$getagnts)
            ->update([
                'assign_artists' => $new,

            ]);
        }

        //$this->confirmuser = $request->all();
        // $request->session()->put('users', $this->confirmuser);
        event(new Registered($usersss));
        $this->guard()->login($usersss);
        return redirect('/home')->withSuccess('Payment made successfully');
    }

}
