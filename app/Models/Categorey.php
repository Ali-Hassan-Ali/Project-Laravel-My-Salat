<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorey extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends  = ['logo_path','category_id'];

     //attributes----------------------------------
    public function getLogoPathAttribute()
    {
        if ($this->logo == 'categorey_images/halls.png') return asset('site_assets/category/apartments.png');
        if ($this->logo == 'categorey_images/movedhalls.png') return asset('site_assets/category/tent.png');
        if ($this->logo == 'categorey_images/hotels.png') return asset('site_assets/category/hotels.png');
        if ($this->logo == 'categorey_images/graduating.png') return asset('site_assets/category/Furnished apartments.png');
        if ($this->logo == 'categorey_images/singer.png') return asset('site_assets/category/singer.png');
        if ($this->logo == 'categorey_images/appartments.png') return asset('site_assets/category/Wedding car.png');
        if ($this->logo == 'categorey_images/suit.png') return asset('site_assets/category/suit.png');
        if ($this->logo == 'categorey_images/beauty.png') return asset('site_assets/category/Wedding hairdresser.png');
        if ($this->logo == 'categorey_images/appartments.png') return asset('site_assets/category/resort.png');
        if ($this->logo == 'categorey_images/meeting.png') return asset('site_assets/category/resort.png');

        return asset('storage/' . $this->logo);

    }//end of get logo path

    public function getCategoryIdAttribute()
    {
        return $this->id;

    }//end of get logo path

    public function favoreds()
    {
        return $this->hasMany(Favored::class);

    }//end of 

}//end of model
