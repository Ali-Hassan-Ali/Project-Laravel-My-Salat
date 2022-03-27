<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['image_path','category_service','images','payment','package'];

     //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function getPackageAttribute()
    {
        return Package::where('banner_id', $this->id)->get();

    }//end of get image path

    public function getCategoryServiceAttribute()
    {
        $categoreys = ServiceCategory::with('service')->whereRelation('service','banner_id', $this->id)->get();

        return $categoreys;

    }//end of get image path

    public function getImagesAttribute()
    {
        $gallerys = Gallery::where('banner_id', $this->id)->get();

        return $gallerys;

    }//end of get image path

    public function getPaymentAttribute()
    {
        $payments = PaymentClient::where('banner_id', $this->id)->get();

        return $payments;

    }//end of get image path

     //relationsheep----------------------------------
    public function owner()
    {
        return $this->belongsTo(Owner::class);
        
    }//end of owner

    public function category()
    {
        return $this->belongsTo(Categorey::class,'categoreys_id');
        
    }//end of owner

    public function service()
    {
        return $this->hasMany(Service::class,'banner_id');
        
    }//end of service

    public function payment_clients()
    {
        return $this->hasMany(PaymentClient::class,'payment_admins_id');
        
    }//end of service

    public function product()
    {
        return $this->hasMany(Product::class);
        
    }//end of service

    //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%")
                     ->orWhere('map', 'like', "%$search%")
                     // ->orWhere('cost', 'like', "%$search%")
                     ->orWhere('description', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

}//end of model
