<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentClient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['name','image_path'];

     //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return PaymentAdmin::find($this->payment_admins_id)->image_path;

    }//end of get image path   

    public function getNameAttribute()
    {
        return PaymentAdmin::find($this->payment_admins_id)->name;

    }//end of get logo path : svg

}//end of model
