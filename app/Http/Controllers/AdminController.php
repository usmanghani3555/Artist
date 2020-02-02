<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{

    public function index()
    {
        // return view('create');
    }

    public function artists()
    {
        $data = DB::table('users')
            ->where('role', 'artist')
            ->get();
        return view('artist.index', compact('data'));
    }

    public function edit($id)
    {
        $data = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('artist.edit', compact('data'));
    }

    public function delete()
    {
        $id = $_POST['id'];
        DB::table('users')
            ->where('id', $id)
            ->delete();


        $biography_count = DB::table('artist_biography')
            ->where('user_id', $id)
            ->count();

        if ($biography_count > 0) {
            DB::table('artist_biography')
                ->where('user_id', $id)
                ->delete();
        }

        return "1";
    }

    public function memberIndex($id = null)
    {
        if(empty($id)) {
            $data = DB::table('members')
                ->where('user_id', Auth::user()->id)
                ->get();
        }
        else{
            $data = DB::table('members')
                ->where('user_id',$id)
                ->get();
        }
        return view('members.index', compact('data'));
    }

    public function editMember($id)
    {
        $data = DB::table('members')
            ->where('id', $id)
            ->first();
        return view('members.edit', compact('data'));
    }

    public function updateMember(Request $request, $id)
    {
        DB::table('members')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role
            ]);
        return redirect('/members')->with('success', 'Member has been Updated!');

    }

    public function artist_biography($id)
    {
        $data = DB::table('artist_biography')->where('user_id', $id)->first();
        return view('artist.add_biography', compact('data', 'id'));
    }

    public function edit_biography($id)
    {
        $data = DB::table('artist_biography')
            ->where('id', $id)
            ->first();
        return view('artist.bio', compact('data', 'id'));
    }
    
    public function store_biography(Request $request)
    {

        $data = DB::table('artist_biography')
        ->where('user_id', $request->user_id)
        ->first();
        // dd($data);
        if ($request->hasfile('bio_image')) {

            $bio_image = $request->file('bio_image') ;
            $image_name = $bio_image->getClientOriginalName();
            $bio_image->move(public_path() . '/images/bio_images', $image_name);

            // $data[] = $image_name;
        }else{
            if(!empty($data)){
                $image_name = $data->bio_image;
            }else{
                $image_name = "";
            }
        }

        if (empty($data)) {
            DB::table('artist_biography')->insert([
                'user_id' => $request->user_id,
                'biography' => $request->biography,
                'bio_image' => $image_name
            ]);
            return redirect()->route('artist.add_biography', [$request->user_id])->with('success', 'Biography has been Added Successfully!');
        } else {
            DB::table('artist_biography')
                ->where('user_id', $request->user_id)
                ->update([
                    'biography' => $request->biography,
                    'bio_image' => $image_name
                ]);
            return redirect()->route('artist.add_biography', [$request->user_id])->with('success', 'Biography has been Updated Successfully!');
        }
    }

    public function contracts($id)
    {
        $data = DB::table('artist_contracts')->where('user_id', $id)->orderBy('created_at', 'DESC')->get();
        return view('artist.contracts', compact('data', 'id'));
    }
    
    public function add_contract($id)
    {   
        return view('artist.add_contract', compact('id'));
    }

    public function edit_contract($id)
    {
        $data = DB::table('artist_contracts')
            ->where('id', $id)
            ->first();
        return view('artist.add_contract', compact('data', 'id'));
    }

    public function store_contract(Request $request)
    {
        $this->validate($request, [
            'contract_name'    =>  'required|string|max:100',
            'contract_document.*'     =>  'required|mimes:pdf,doc,docx,jpeg,png,jpg,svg',
        ]);

        $contract_id = '';
        if(!empty($request->contract_id)){
            $contract_id = $request->contract_id;
        }
        $data = DB::table('artist_contracts')
            ->where('id', $contract_id)
            ->first();
        
        
        if ($request->hasfile('contract_document')) {
            $files = $request->file('contract_document');
            $imageName = array();
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $file->move(public_path().'/images/contract_document', $filename);
                $imageName[] = $filename; 
            }
            $image_name = implode(', ', $imageName);
        } else {
            if (!empty($data)) {
                $image_name = $data->contract_document;
            } else {
                $image_name = "";
            }
        }

        if (empty($data)) {
            DB::table('artist_contracts')->insert([
                'user_id' => $request->user_id,
                'login_id' =>  Auth::user()->id,
                'contract_name' => $request->contract_name,
                'contract_document' => $image_name
            ]);
            return redirect()->route('artist.contracts', [$request->user_id])->with('success', 'Contract has been Added Successfully!');
        } else {
            DB::table('artist_contracts')
                ->where('id', $contract_id)
                ->update([
                'login_id' => Auth::user()->id,
                'contract_name' => $request->contract_name,
                'contract_document' => $image_name
                ]);
            return redirect()->route('artist.contracts', [$request->user_id])->with('success', 'Contract has been Updated Successfully!');
        }
    }

    public function contractDelete(Request $request)
    {
        $del = DB::table('artist_contracts')
            ->where('id', $request->id)
            ->delete();
        if(!empty($del)){
            return "1";
        }else{
            return false;
        }
    }

    public function contractDocument(Request $request)
    {
        $data = DB::table('artist_contracts')
            ->where('id', $request->id)
            ->first();
        return json_encode($data);
    }
    
    public function createMember($id = null)
    {
        if(!empty($id)){
            return view('members.create',compact('id'));
        }

        return view('members.create');

    }

    public function storeMember(Request $request)
    {
        if (empty($request->u_id)) {
            $uid = Auth::user()->id;
            DB::table('members')
                ->insert([
                    'user_id' => $uid,
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role
                ]);
            return redirect('/members')->with('success', 'Member created successfully!');

        }else{
            DB::table('members')
                ->insert([
                    'user_id' => $request->u_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role
                ]);
            return redirect()->route('member.index',$request->u_id)->with('success', 'Member created successfully!');

        }
    }

    public function deleteMember()
    {

        $memid = $_POST['id'];
        DB::table('members')
            ->where('id', $memid)
            ->delete();
        return 1;
    }
    public function updateBooking()
    {
        $id = $_POST['id'];
        $pkg = $_POST['pkg'];
        DB::table('users')
            ->where('id', $id)
            ->update([
                'admin_upgrage' => $pkg,
                'admin_updates' =>DB::raw('now()'),
            ]);
        return 1;

    }
}
