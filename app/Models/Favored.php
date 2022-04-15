<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favored extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['category','name'];

    public function getCategoryAttribute()
    {
        return Banner::find($this->banner_id)->categoreys_id;

    }//end of fun get category id

    public function getNameAttribute()
    {
        return Banner::find($this->banner_id)->category->name;

    }//end of fun get name category
    
}//end of model
