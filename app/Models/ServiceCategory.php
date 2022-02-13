<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['sub_category'];

    public function sub_categorys()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');

    }//end of categories

    public function getSubCategoryAttribute()
    {
        if ($this->parent_id > '1') {

            return $this->name;

        } else {

            return __('owner.no_categorey');            

        }//end of if     

    }//end of get sub categoty
    
}//end of model
