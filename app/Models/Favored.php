<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favored extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['category_id','name'];

    public function getCategoryIdAttribute()
    {
        return Banner::find($this->banner_id)->categoreys_id;

    }//end of fun get category id

    public function getNameAttribute()
    {
        return Banner::find($this->banner_id)->category->name;

    }//end of fun get name category

    public function banner()
    {
        return $this->belongsTo(Banner::class);

    }//end of 
    
}//end of model
