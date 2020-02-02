<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;




class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendemail($from, $to, $subject, $message)
    {

        $from = $from;
        $to = $to;
        $subject = $subject;
        $message = $message;
        
        $headers = "From: Artist Booking Management System  <".$from.">" . "\r\n";
        $headers .="Content-type:text/html; charset=UTF-8" . "\r\n";
        mail($to, $subject, $message, $headers);

    }

    
}
