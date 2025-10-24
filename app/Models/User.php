<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\HasRolesAndPermissions;

class User extends Authenticatable implements LaratrustUser
{
    use HasRolesAndPermissions;
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded  = [];
    
    protected $hidden   = ['password','remember_token'];
    
    protected $casts    = ['email_verified_at' => 'datetime'];

    protected $appends  = ['image_path','favoreds'];

    //attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

    public function getFavoredsAttribute()
    {
        return $this->favoreds()->count() > 0 ? $this->favoreds() : [];

    }//end of fun

    //scopes -------------------------------------
    public function scopeWhenSearch($query , $search) 
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name' , 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%");
        });
        
    }//end of fun copeWhenSearch

    //relations ----------------------------------


    public function favoreds()
    {
        return $this->hasMany(Favored::class);

    }//end of favoreds
    
}//end of model
