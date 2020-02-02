<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'bandcamp', 'facebook', 'instagram', 'soundcloud', 'spotify', 'twitter', 'youtube', 'apple', 'featured_playlist'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
