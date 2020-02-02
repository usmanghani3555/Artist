<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Note;
use \ConvertApi\ConvertApi;
use App\User;
class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function download($file_name)
	{   
        if(!empty($file_name) && file_exists( public_path().'/images/contract_document/'.$file_name)){
            $file_path = public_path('images/contract_document/'.$file_name);
            return response()->download($file_path);
        }else{
            return redirect()->route('myartist')->with('errors', 'Sorry! Document not found.');
        }
    }

}
