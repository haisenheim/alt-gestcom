<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FournisseurResource extends JsonResource
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
            'logo'=>$this->logo,
            'percent'=>$this->percent,
            'min_bon_achat'=>$this->min_bon_achat,
            //'categories'=>CategoryListResource::collection($this->categories->where('parent_id',0)),
            //'promotions'=>PromotionListResource::collection($this->promotions),
            //'products'=>ProductResource::collection($this->articles),
        ];
    }
}
