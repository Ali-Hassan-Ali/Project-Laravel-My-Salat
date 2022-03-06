<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['status'];

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

    }//end of get status coloor

    //relation----------------------------------

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
