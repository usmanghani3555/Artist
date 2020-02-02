<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'descripton', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
