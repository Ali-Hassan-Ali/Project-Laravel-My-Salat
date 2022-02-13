<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['image_path'];

     //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

     //relationsheep----------------------------------
    public function owner()
    {
        return $this->belongsTo(OWner::class);
        
    }//end of owner

    //relationsheep----------------------------------
    public function category()
    {
        return $this->belongsTo(Categorey::class,'categoreys_id');
        
    }//end of owner

}//end of model
