<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorey extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['logo_path'];

     //attributes----------------------------------
    public function getLogoPathAttribute()
    {
        return asset('storage/' . $this->logo);

    }//end of get logo path : svg

}//end of model
