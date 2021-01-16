<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function catagory()
    {
        return $this->belongsTo('App\Models\Catagory');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }


}
