<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'year',
        'owner_id',
        'IMDB_href',
        'img_src',
        'description',
        'auto_fill'
    ];
}
