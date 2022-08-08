<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['receipt_path', 'pdf_path', 'image_path'];

     //attributes----------------------------------

    public function getReceiptPathAttribute()
    {
        return asset('storage/' . $this->receipt_image);

    }//end of get image path

    public function getPdfPathAttribute()
    {
        return asset('storage/' . $this->pdf);

    }//end of fun

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of fun

    //relation----------------------------------

    public function order()
    {
        return $this->hasOne(Order::class,'order_id');

    }//end of order
    
}//end of model
