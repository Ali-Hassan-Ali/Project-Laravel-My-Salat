<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['video_path'];

     //attributes----------------------------------
    public function getVideoPathAttribute()
    {
        return asset('storage/' . $this->video);

    }//end of get image path

}//end of model
