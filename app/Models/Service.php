<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['sub_category'];

    public function getSubCategoryAttribute()
    {
        if ($this->service_categorie_id > '1') {

            $categorey = ServiceCategory::where('id', $this->service_categorie_id)->first();

            return $categorey->name;

        } else {

            return __('owner.no_categorey');            

        }//end of if     

    }//end of get sub categoty
    
}//end of model
