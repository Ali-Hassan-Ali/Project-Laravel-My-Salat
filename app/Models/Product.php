<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['tages' => 'array'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);

    }//end if hasMany imaged

    protected $appends  = ['image_path'];

     //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path  

    // public function setTagesAttribute($value)
    // {
    //     $tages = [];

    //     foreach ($value as $array_item) {
    //         if (!is_null($array_item['key'])) {
    //             $tages[] = $array_item;
    //         }
    //     }

    //     $this->attributes['tages'] = json_encode($tages);
    // } 

}//end of model
