<?php

namespace App\Helpers;

class CommonHelper
{
    
    public function dateFormate($date){
        if(!empty($date)){
            return date('m-d-Y', strtotime($date));
        }else{
            return false;
        }
    }

    public static function instance()
    {
        return new CommonHelper();
    }
}

