<?php

namespace App;

use Carbon\Carbon;
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

    public function getAgeAttribute()
    {
        return Carbon::now()->year($this->year)->diffForHumans();
    }
}
