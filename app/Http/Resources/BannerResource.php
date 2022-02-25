<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ServiceCategorey;
use App\Models\ServiceCategory;
use App\Http\Controllers\Api\ServiceCategoreyController;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'map'       => $this->map,
            'map'       => $this->map,
            'image'     => $this->image_path,
            'user_name' => $this->owner->name,
            // 'category'  => $this->category->name,
            // 'category'  => $this->service,
            'category'   => ServiceCategorey::collection(ServiceCategory::with('service')
                                                        ->whereRelation('service','banner_id', $this->id)
                                                        ->get()),
        ];
    }
}
