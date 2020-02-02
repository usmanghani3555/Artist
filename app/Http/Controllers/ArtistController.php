<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Purchasecoin;
use App\Notification;
use App\Links;
use App\Gallery;
use App\Coin;
use DB;
use Auth;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function links($id = null)
    {   if(empty($id)){
        $data = Links::where('user_id', Auth::user()->id)->first();
    }else{
        $data = Links::where('user_id', $id)->first();
    }
        return view('artist.links.index', compact('data'));
    }

    public function createLinks($id = null)
    {
        if(!empty($id)){
            return view('artist.links.create',compact('id'));
        }

        return view('artist.links.create');

    }

    public function storeLinks(Request $request)
    {
        if (empty($request->u_id)) {
            $other = array();
            for($i=1;$i<=4;$i++){
                if(!empty($_POST['Olabel'.$i]) && !empty($_POST['Other'.$i]) ){
                    $other[] = array('key'.$i=>$_POST['Olabel'.$i],'value'.$i=>$_POST['Other'.$i]);
                }
            }

            //print_r(json_encode($other));exit;
            $user = new Links();
            $user->user_id = Auth::user()->id;
            $user->bandcamp = $request->bandcamp;
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            $user->soundcloud = $request->soundcloud;
            $user->spotify = $request->spotify;
            $user->twitter = $request->twitter;
            $user->youtube = $request->youtube;
            $user->apple = $request->apple;
            $user->facebook = $request->facebook;
            $user->featured_playlist = $request->featuredplaylist;
            $user->other = json_encode($other);
            $user->save();
            return redirect()->route('link')->with('success', 'Links created successfully!');

        }else{
            $other = array();
            for($i=1;$i<=4;$i++){
                if(!empty($_POST['Olabel'.$i]) && !empty($_POST['Other'.$i]) ){
                    $other[] = array('key'.$i=>$_POST['Olabel'.$i],'value'.$i=>$_POST['Other'.$i]);
                }
            }

            //print_r(json_encode($other));exit;
            $user = new Links();
            $user->user_id = $request->u_id;
            $user->bandcamp = $request->bandcamp;
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            $user->soundcloud = $request->soundcloud;
            $user->spotify = $request->spotify;
            $user->twitter = $request->twitter;
            $user->youtube = $request->youtube;
            $user->apple = $request->apple;
            $user->facebook = $request->facebook;
            $user->featured_playlist = $request->featuredplaylist;
            $user->other = json_encode($other);
            $user->save();
            return redirect()->route('link',$request->u_id)->with('success', 'Links created successfully!');
        }
    }

    public function editLinks($id)
    {
        $user = Links::where('user_id',$id)->first();
        return view('artist.links.edit', compact('user'));
    }

    public function updateLinks(Request $request, $id)
    {   //dd($request);

        $other = array();
        for($i=1;$i<=4;$i++){
            if(!empty($_POST['Olabel'.$i]) && !empty($_POST['Other'.$i]) ){
                $other[] = array('key'.$i=>$_POST['Olabel'.$i],'value'.$i=>$_POST['Other'.$i]);
            }
        }
        DB::table('links')
            ->where('user_id', $id)
            ->update([
                'bandcamp' => $request->bandcamp,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'soundcloud' => $request->soundcloud,
                'spotify' => $request->spotify,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'apple' => $request->apple,
                'featured_playlist' => $request->featuredplaylist,
                'other' => json_encode($other)
            ]);


        return redirect()->route('link',$id)->with('success', 'Links has been updated');
    }

    public function index($id = null)
    {   if (empty($id)){
        $data = Gallery::where('user_id', Auth::user()->id)->get();
    }else{
        $data = Gallery::where('user_id',$id)->get();
    }
        return view('artist.gallery.index', compact('data'));
    }

    public function createGallery($id = null)
    {
        if(!empty($id)){
            return view('artist.gallery.create',compact('id'));
        }
        return view('artist.gallery.create');


    }

    public function storeGalleryData(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'gallery_image' => 'required',
        ]);
        if ($request->hasfile('gallery_image')) {

            $gallery_image = $request->file('gallery_image') ;
            $image_name = $gallery_image->getClientOriginalName();
            $gallery_image->move(public_path() . '/images/gallery_images', $image_name);
            // $data[] = $image_name;
        }

        if (empty($request->u_id)) {
            $data = new Gallery([
                'user_id' => Auth::user()->id,
                'title' => $request->get('title'),
                'descripton' => $request->get('description'),
                'image' => $image_name
            ]);
            $data->save();
            return redirect('/gallery')->with('success', 'Gallery has been added');
        }else{
            $data = new Gallery([
                'user_id' => $request->u_id,
                'title' => $request->get('title'),
                'descripton' => $request->get('description'),
                'image' => $image_name
            ]);
            $data->save();
            return redirect()->route('gallery.all',$request->u_id)->with('success', 'Gallery has been added');

        }
    }

    public function gallery_edit($id)
    {
        $data = Gallery::where('id', $id)->firstOrFail();
        return view('artist.gallery.edit', compact('data'));
    }

    public function gallery_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($request->hasfile('gallery_image')) {

            foreach ($request->file('gallery_image') as $gallery_image) {

                $image_name = $gallery_image->getClientOriginalName();
                $gallery_image->move(public_path() . '/images/gallery_images', $image_name);
                // $data[] = $image_name;
                Gallery::where('user_id', Auth::user()->id)
                    ->update([
                        'user_id' => Auth::user()->id,
                        'image' => $image_name
                    ]);
            }
        } else {
            Gallery::where('user_id', Auth::user()->id)
                ->update([
                    'title' => $request->get('title'),
                    'descripton' => $request->get('description')
                ]);
        }
        return redirect('/gallery')->with('success', 'Gallery has been updated');
    }

    public function delete()
    {
        $gallery_id = $_POST['id'];
        $gallery_img = $_POST['img'];
        if (!empty($gallery_img)) {
            unlink(public_path('images/gallery_images/' . $gallery_img));
        }
        $data = Gallery::find($gallery_id);
        $data->delete();
        return 1;
    }

    public function delete_img()
    {

        $gallery_id = $_POST['id'];
        $gallery_img = $_POST['image_name'];
        DB::table('gallery')
            ->where('id', $_POST['id'])
            ->update([
                'image' => ''
            ]);
        unlink(public_path('images/gallery_images/' . $_POST['image_name']));

        return 1;
    }
    public function accommodation($id)
    {
        $data = DB::table('acomodations')->where('user_id',$id)->get();
        return view('artist.accommodation.index',compact('data'));
    }
    public function accommodationCreate($id)
    {
        return view('artist.accommodation.create',compact('id'));
    }
    public function accommodationSave(Request $request,$id)
    {
       // dd($request);
        DB::table('acomodations')->insert([
            'user_id'=>$id,
            'hotel_name'=>$request->hotel,
            'date'=>$request->dandt,
            'address'=>$request->address,
            'confirmation_code'=>$request->c_code,
            'departure_date'=>$request->d_date,
            'arrival_date'=>$request->arrve_date,
            'airline'=>$request->airline,
            'flight_confirmation_code'=>$request->flight_c_code,
        ]);
        return redirect()->route('accommodation.view',$id)->with('success', 'Accommodation created Successfully!');
    }
    public function acumDelete()
    {
        $id = $_POST['id'];

        DB::table('acomodations')->where('id',$id)->delete();
        return 1;
    }
    public function updateAccommodation()
    {
        $id = $_POST['id'];
        $hotel = $_POST['hotel'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $c_code = $_POST['c_code'];
        $arrive = $_POST['arrive'];
        $departure = $_POST['departure'];
        $airline = $_POST['airline'];
        $flight_c_code = $_POST['flight_c_code'];
        $update = DB::table('acomodations')
            ->where('id', $id)
            ->update([
                'hotel_name' => $hotel,
                'date' => $date,
                'address' => $address,
                'confirmation_code' => $c_code,
                'arrival_date' => $arrive,
                'departure_date' => $departure,
                'airline' => $airline,
                'flight_confirmation_code' => $flight_c_code
            ]);
        if($update) {
            return 1;
        }else{
            return false;
        }


    }
    public function upgradepack(){
        $data = User::where('id', Auth::user()->id)->first();
        return view('upgrade',compact('data'));
    }
	
	public function gamelobby()
	{
        $coins = Coin::orderBy('created_at', 'desc')->get();
		return view('gamification.gamification', compact('coins'));
	}

    public function purchaseCoin(Request $request){
        
        if(isset($_POST['card']) && !empty($_POST['card'])){

            $coins = Coin::whereIn('id', $request->card)->orderBy('created_at', 'desc')->get();
            
            $totalCoin = 0;
            foreach($coins as $coin){
                
                /* save purchase coin info */
                $purchasecoin = new Purchasecoin;
                $purchasecoin->customer_id = Auth::user()->id;
                $purchasecoin->customer_name = Auth::user()->name;
                $purchasecoin->customer_email = Auth::user()->email;
                $purchasecoin->card_id	= $coin->id;
                $purchasecoin->card_title	= $coin->title;
                $purchasecoin->card_image	= $coin->image;
                $purchasecoin->card_price	= $coin->amount;
                $purchasecoin->coins	= $coin->coins;
                $totalCoin = $totalCoin + $coin->coins;
                $purchasecoin->total_coins = $request->ptotalCoin;
                $purchasecoin->save();

                /* add notification */
                $send_to = '';
                $send_to = User::select('id', 'email')->where('role', 'admin')->get();
                
                foreach($send_to as $sto){
                    
                    $notification = new Notification;
                    $notification->type = 'Gift Cart';
                    $notification->notificaion = ucfirst(Auth::user()->name).' '.'has purchased gift card ('.$coin->title.')';
                    $notification->notification_to = $sto->id;
                    $notification->notification_from = Auth::user()->id;
                    $notification->save();

                    /* email send to all admin */
                    $from = Auth::user()->email;

                    $to = $sto->email;
                    $subject = "Gift Card Purchase";
                    $message = '';
                    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                    $message .= "<tr style='background: #eee;'>
                    <td><strong>User Name:</strong> </td><td>" . Auth::user()->name . "</td></tr>";
                    $message .= "<tr><td><strong>Email:</strong> </td><td>" . Auth::user()->email . "</td></tr>";
                    $message .= "<tr><td><strong>Message:</strong> </td><td>Gift Card Purchase</td></tr>";
                    $message .= "<tr><td><strong>Points:</strong> </td><td>" . $coin->coins . "</td></tr>";
                    $message .= "<tr><td><strong>Amount:</strong> </td><td> $" . $coin->amount . "</td></tr>";
                    $message .= "<tr><td><strong>Date:</strong> </td><td>" . date('m-d-Y') . "</td></tr>";
                    $message .= "</table>";
                    $this->sendemail($from, $to, $subject, $message);
                } 

            }

            //  minus the coins from total coins
            $coin_update = Auth::user()->coins - $totalCoin;    
            User::where('id', Auth::user()->id)
                ->update(['coins' => $coin_update]);

            return redirect()->back()->with('success', 'Gift Card Purchased Successfully!'); 
        }else{
            return redirect()->back()->with('error', 'Please! Select at least one gift card box.');
        }
        
    }

    public function markAsRead(Request $request){
        $rs = Notification::where('id', $request->id)->update(['status' =>1]);
        if(!empty($rs)){
            return 1;
        }
        return false;
    }


}
