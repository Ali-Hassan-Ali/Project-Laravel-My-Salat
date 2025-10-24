<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;

class Admin extends Authenticatable implements LaratrustUser
{
    use HasFactory;
    use HasRolesAndPermissions;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password', 'phone'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    protected $appends = ['image_path'];

    // attributes----------------------------------
    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);

    }// end of get image path

    // scopes -------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        });

    }// end o fscopeWhenSearch`

    // relations ----------------------------------

}// end of model
