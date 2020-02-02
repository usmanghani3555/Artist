<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Links;
use App\Pointhistory;
use DB;
use Auth;


class ManagerController extends Controller
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
        $users = User::get()->where('role', 'manager');

        return view('manager.index', compact('users'));
    }

    public function create()
    {
        $artist = DB::table('users')
            ->select('id', 'name')
            ->where('role', 'artist')
            ->get();

        return view('manager.add', compact('artist'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'unique:users,email'
        ]);

        $assignartist = $request->assignartist;
        if (!empty($assignartist)){
        $artisval = implode(',', $assignartist);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'manager';
            $user->assign_artists = $artisval ;
            $user->save();
            return redirect()->route('all_manager')->with('success', 'Manager Save Successfully!');
        }else
        $artisval = "";
        // store in the database
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'manager';
        $user->assign_artists = $artisval ;
        $user->save();
        return redirect()->route('all_manager')->with('success', 'Manager Save Successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $artist = DB::table('users')
            ->select('id', 'name')
            ->where('role', 'artist')
            ->get();
        return view('manager.edit', compact('user', 'artist'));
    }

    public function update(Request $request, $id)
    {
      
      
        $assignartist = $request->assignartist;
        $artisval = "";
        if (!empty($assignartist)){
            $artisval = implode(',', $assignartist);
        }
        if(!empty($request->password)){
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'assign_artists' => $artisval ? $artisval:""
            ]);
        }else{
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'assign_artists' => $artisval ? $artisval:""
                ]);
        }

        return redirect()->route('all_manager')->with('success', 'Manager has been updated');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $category = User::find($id);
        $category->delete();

        return "1";
    }

    public function managerArtist()
    {

        $users = User::where('id', auth()->user()->id)->first()->assign_artists;
        if (!empty($users)) {
            $myartis = User::whereIn('id', explode(',', $users))->get();
        }
        return view('manager.myartist', compact('myartis'));
    }

    public function ediMyArtist($id)
    {
        $artist = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('manager.editmyartist', compact('artist', 'id'));
    }

    public function updateMyArtist(Request $request, $id)
    {
        $finalpoints = 0;
        if(!empty($request->addpoints)){
            $finalpoints = $request->totalpoints;
            Pointhistory::insert([
                'admin_id' => Auth::user()->id,
                'artist_id' => $request->artist_id,
                'assign_by' => Auth::user()->name,
                'assign_to' => $request->name,
                'availablepoints' => $request->availablepoints,
                'name' => $request->pointname,
                'addpoints' => $request->addpoints,
                'totalpoints' => $finalpoints,
            ]);
        }else{
            $finalpoints = $request->availablepoints;
        }

        if(!empty($request->password)){
        DB::table('users')
            ->where('id', $request->artist_id)
            ->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'insta_name' => $request->insta_name,
                'coins' => $finalpoints,
            ]);
        }else{
            DB::table('users')
                ->where('id', $request->artist_id)
                ->update([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'insta_name' => $request->insta_name,
                    'insta_name' => $request->insta_name,
                    'coins' => $finalpoints,
                ]);
        }
        if(Auth::user()->role == "artist" || Auth::user()->role == "admin"){
        return redirect()->route('artist')->with('success', 'Artist has been updated');
        }
        if(Auth::user()->role == "manager"){
            return redirect()->route('myartist')->with('success', 'Manage has been updated');
        }
    }

    public function artistdetail($id)
    {
        $data = User::where('id',$id)->first();
        $members = DB::table('members')->where('user_id',$id)->get();
        $bio = DB::table('artist_biography')->where('user_id',$id)->first();
        $links = DB::table('links')->where('user_id',$id)->first();
        $gallery = DB::table('gallery')->where('user_id',$id)->get();
        $subs = DB::table('subscription')->where('user_id',$id)->get();

        return view('manager.artistmanagers', compact('data','members','bio','links','gallery','subs'));
    }

    public function updateMember()
    {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $role = $_POST['role'];
        DB::table('members')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'role' => $role
            ]);
        return 1;

    }
    public function updateBio()
    {
      $id = $_POST['id'];
      $bio = $_POST['bio'];
        DB::table('artist_biography')
            ->where('id', $id)
            ->update([
                'biography' => $bio
            ]);
        return 1;

    }
    public function deleteBio()
    {
        $memid = $_POST['id'];
        DB::table('artist_biography')
            ->where('id', $memid)
            ->delete();
        return 1;
    }

    public function pointshistory($id)
    {
        $data = Pointhistory::where('artist_id', $id)
            ->orderBy('id', 'desc')
            ->get();
        return view('manager.pointshistory', compact('data'));
    }


}
