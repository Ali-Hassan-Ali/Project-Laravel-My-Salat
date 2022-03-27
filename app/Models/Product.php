<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['image_path','tages'];

     //relationshep----------------------------------
    public function images()
    {
        return $this->hasMany(ProductImage::class);

    }//end if hasMany imaged

    public function tages()
    {
        return $this->hasMany(Tage::class);

    }//end if hasMany imaged

     //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function getTagesAttribute()
    {
        return Tage::where('product_id',$this->id)->get();

    }//end of get image path

}//end of model
