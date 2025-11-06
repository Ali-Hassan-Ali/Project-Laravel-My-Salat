<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_path'];

    // attributes----------------------------------
    public function getImagePathAttribute()
    {
        // return 'gfgfgfg';

        return asset($this->image);

        // return asset('storage/'.$this->image);

    }// end of get image path

}// end of model
