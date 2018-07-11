<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$request->id,
            'foodName'=>$request->foodName,
            'foodType'=>$request->foodType,
            'price'=>$request->price,
            'description'=>$request->description,
        ];

    }
}
