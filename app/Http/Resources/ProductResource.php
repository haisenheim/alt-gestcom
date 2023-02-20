<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo'=>$this->photo,
            'price'=>$this->price?$this->price:0,
            'description'=>$this->full_description?$this->full_description:'',
            'short_description'=>$this->short_description?$this->short_description:'',
            'category'=>new CategoryListResource($this->category),
        ];
    }
}
