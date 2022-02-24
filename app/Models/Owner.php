<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Owner extends Authenticatable
{
    use HasFactory;

    // protected $dispatchesevents = [
    //     'createed' => BannerOwner::class,
    // ];
    
    protected $guarded  = [];
    
    protected $guard    = 'owner';

    protected $hidden   = ['password','remember_token'];
    
    protected $casts    = ['email_verified_at' => 'datetime'];

    protected $appends  = ['image_path'];

    //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function banner()
    {
        return $this->hasOne(Banner::class);

    }//end of owner

    public function service()
    {
        return $this->hasMany(Service::class, 'owner_id');

    }//end of belongsTo owner

}//end of model
