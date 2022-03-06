<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['noteice_path','receipt_path'];

     //attributes----------------------------------
    public function getNoteicePathAttribute()
    {
        return asset('storage/' . $this->noteice_image);

    }//end of get image path

    public function getReceiptPathAttribute()
    {
        return asset('storage/' . $this->receipt_image);

    }//end of get image path

    //relation----------------------------------

    public function order()
    {
        return $this->hasOne(Order::class,'order_id');

    }//end of order
    
}//end of model
