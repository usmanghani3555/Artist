<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
        $subs = array();
        $totalusers = array();
        $artusers = array();
        $manusers = array();
        if (auth()->user()->role == "admin")
        {
            $totalusers = DB::table('users')->where('role','!=','admin')->count();
            $artusers = DB::table('users')->where('role','artist')->count();
            $manusers = DB::table('users')->where('role','manager')->count();
        }
        if(auth()->user()->role == "artist"){
            $subs = DB::table('subscription')->where('user_id',Auth::user()->id)->get();
            $data = DB::table('users')->where('id',Auth::user()->id)->first();
        }
        return view('home',compact('totalusers','artusers','manusers','data','subs'));
    }
    public function profile($id)
    {
        $data =DB::table('users')
            ->where('id',Auth::user()->id)
            ->first();

        return view('profile',compact('data'));
    }
    public function updateProfile(Request $request,$id)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/img/', $filename);

            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->name ? $request->name : "",
                    'email' => $request->email ? $request->email : "",
                    'mobile' => $request->mobile ? $request->mobile : "",
                    'members_details' => $request->members_details ? $request->members_details : "",
                    'photo' => $filename
                ]);

        }else {
            $photo = "";
            $photo = DB::table('users')->where('id',$id)->first()->photo;
            if(!empty($photo)) {
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name ? $request->name : "",
                        'email' => $request->email ? $request->email : "",
                        'mobile' => $request->mobile ? $request->mobile : "",
                        'members_details' => $request->members_details ? $request->members_details : "",
                        'photo' => !empty($photo)?$photo:""
                    ]);
            }

        }
        return redirect()->route('user.profile',$id)->with('success', 'Profile has been Updated!');

    }

}
