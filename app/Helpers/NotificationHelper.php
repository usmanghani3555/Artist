<?php

namespace App\Helpers;

use Auth;
use DB;

class NotificationHelper
{
    
    public  function count_notification()
    {
        $total = DB::table('notifications')->where('notification_to', Auth::user()->id)->where('status', 0)->count();
        if(!empty($total)){
            return $total;
        }else{
            return 0;
        }
    }

    public function notifications()
    {
        $notif = DB::table('notifications')
            ->select('notifications.id', 'notifications.notificaion', 'notifications.created_at', 'users.photo')
            ->join('users', 'users.id', '=', 'notifications.notification_from')
            ->where('notifications.notification_to', Auth::user()->id)
            ->where('notifications.status', 0)
            ->orderBy('notifications.created_at', 'desc')
            ->get();
    
        if (!empty($notif)) {
            return $notif;
        } else {
            return false;
        }
    }


    public  function get_time_ago($time)
    {
        if(!(empty($time))){
            $oldtime = strtotime($time);
            $time_difference = time() - $oldtime;

            if ($time_difference < 1) {
                return 'less than 1 second ago';
            }
            $condition = array(
                12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
            );

            foreach ($condition as $secs => $str) {
                $d = $time_difference / $secs;
                if ($d >= 1) {
                    $t = round($d);
                    return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
                }
            }
        }else{
            return false;
        }
    }

    public static function instance()
    {
        return new NotificationHelper();
    }
}

