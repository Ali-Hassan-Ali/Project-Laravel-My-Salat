<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['status','hall_name','hall_image','payment_client','category'];

    public function getStatusAttribute()
    {
        if ($this->order_statuses_id == '1') {
            return 'bg-success';
        }

        if ($this->order_statuses_id == '2') {
            return 'bg-warning';
        }

        if ($this->order_statuses_id == '3') {
            return 'bg-danger';
        }

        if ($this->order_statuses_id == '4') {
            return 'bg-danger';
            // witing time
        }

    }//end of get status coloor


    //Attribute----------------------------------

    public function getCategoryAttribute()
    {
        $banner = Banner::find($this->banner_id);

        $category = Categorey::find($banner->categoreys_id);

        return $category->name;

    }//end of payment_order

    public function getPaymentClientAttribute()
    {
        return PaymentClient::where('banner_id', $this->banner_id)->latest()->get();

    }//end of payment_order


    public function getHallNameAttribute()
    {
        return Banner::find($this->banner_id)->name;

    }//end of Hall Name

    public function getHallImageAttribute()
    {
        return Gallery::where('banner_id', $this->banner_id)->select('image')->get();

    }//end of Hall Name


    //relation----------------------------------

    public function banner()
    {
        return $this->belongsTo(Banner::class);
        
    }//end of belongsTo owner

    public function payment_order()
    {
        return $this->hasOne(PaymentOrder::class,'order_id');

    }//end of order

    public function order_statuses()
    {
        return $this->belongsTo(OrderStatus::class,'order_statuses_id');

    }//end of 

    public function package()
    {
        return $this->belongsTo(Package::class,'packages_id');
        
    }//end of belongsTo package

    public function booking()
    {
        return $this->belongsTo(Booking::class,'bookings_id');
        
    }//end of belongsTo booking

    public function owner()
    {
        return $this->belongsTo(OWner::class,'owners_id');
        
    }//end of belongsTo owner

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
        
    }//end of belongsTo user

    public function OrderItem()
    {
        return $this->belongsToMany(OrderItem::class,'order_items');

    }//end of item

    public function order_item()
    {
        return $this->hasMany(OrderItem::class,'order_id');

    }//end of item

}//end of model
