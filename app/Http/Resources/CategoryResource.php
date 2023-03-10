<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'parent'=>new CategoryListResource($this->parent),
            'children'=>CategoryListResource::collection($this->children),
            'products'=>ProductResource::collection($this->articles),
        ];
    }
}
