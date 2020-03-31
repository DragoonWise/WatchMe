<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkUserMovie extends Model
{
    protected $fillable = [
        'movie_id', 'user_id', 'Type', 'ratings'
    ];
}
