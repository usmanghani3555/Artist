<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Coin;
use App\Purchasecoin;
use App\Notification;


class CoinsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function points()
    {
        $data = Coin::orderBy('created_at', 'desc')->get(); 
        return view('coins.index', compact('data'));
    }
    
    public function create()
    {
        return view('coins.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount'    =>  'required',
            'coins'    =>  'required|numeric',
            'image'     =>  'mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // store in the database
        $Coin = new Coin;
        $Coin->title = $request->title;
        $Coin->amount = $request->amount;
        $Coin->coins = $request->coins;

        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $extension = $file->getClientOriginalName(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/coin/', $filename);

            $Coin->image = $filename;           
        }
        $Coin->save();
        
        return redirect()->route('points')->with('success', 'Gift Card has been added Successfully!');
    }


    public function delete()
    {
        $id = $_POST['id'];
        Coin::where('id', $id)->delete(); 
        return "1";
    }

    public function edit($id)
    {
        $coin = Coin::find($id);
        return view('coins.edit', compact('coin'));
    }

    public function update(Request $request, $id)
    {
        $coin = Coin::find($id);
        $this->validate($request, [
            'amount' => 'required',
            'coins' => 'required|numeric'
        ]);

        $coin->title = $request->post('title');
        $coin->amount = $request->post('amount');
        $coin->coins = $request->post('coins');
    
        if($request->hasFile('image')){

            // if(!(empty($coin->image)) && file_exists( public_path().'/coin/'.$coin->image )){
            //     unlink( public_path('/coin/'.$coin->image));
            // }

            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('public/coin/', $filename);
            $coin->image = $filename;
        }        
        $coin->update();
        
        return redirect()->route('points')->with('success', 'Gift Card has been updated!');
    }

    public function submissions()
    {
        $data = Purchasecoin::orWhereNull('coupon')->orderBy('id', 'desc')->get();
        return view('coins.Submissions', compact('data'));
    }

    public function coupon(Request $request)
    {
           if($request->coup!=''){
            Purchasecoin::where('id',$request->id)->update(array('coupon' =>$request->coup));
              
                $coin = Purchasecoin::find($request->id);
                //Page::where('id', $id)->update(array('image' => 'asdasd'));
                $notification = new Notification;
                $notification->type = 'achivements';
                $notification->notificaion = 'Congratulations! ' . ucfirst(Auth::user()->name) . ' ' . ' approved your gift card (' . $coin->card_title . ')';
                $notification->notification_to = $coin->customer_id;
                $notification->notification_from = Auth::user()->id;
                $notification->save();
                /* email send to all admin */
                $from = Auth::user()->email;

                $to = $coin->customer_email;
                $subject = "Gift Card Approved";
                $message = '';
                $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                $message .= "<tr style='background: #eee;'>
                    <td><strong>User Name:</strong> </td><td>" . Auth::user()->name . "</td></tr>";
                $message .= "<tr><td><strong>Email:</strong> </td><td>" . Auth::user()->email . "</td></tr>";
                $message .= "<tr><td><strong>Message:</strong> </td><td>Gift Card Approved</td></tr>";
                $message .= "<tr><td><strong>Points:</strong> </td><td>" . $coin->coins . "</td></tr>";
                $message .= "<tr><td><strong>Amount:</strong> </td><td> $" . $coin->amount . "</td></tr>";
                $message .= "<tr><td><strong>Date:</strong> </td><td>" . date('m-d-Y') . "</td></tr>";
                $message .= "</table>";
                $this->sendemail($from, $to, $subject, $message);
                return 1;
           }
         
    }

    public function submitedcoupon()
    {
        $data = Purchasecoin::orWhereNotNull('coupon')->orderBy('id', 'desc')->get();
        return view('coins.submitedCoupon', compact('data'));
    }
    public function achivements()
    {
        $data = Purchasecoin::where('coupon', '!=',  NULL)->where('customer_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('coins.achivements', compact('data'));
    }

}
