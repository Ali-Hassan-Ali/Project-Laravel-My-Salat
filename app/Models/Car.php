<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['images'];

     //relationshep----------------------------------
    public function images()
    {
        return $this->hasMany(CarImage::class);

    }//end if hasMany imaged


     //attributes----------------------------------
    public function getImagesAttribute()
    {
        return CarImage::where('car_id',$this->id)->get();

    }//end of get image path

}//end of model
