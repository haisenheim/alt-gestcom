<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
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
            'price'=>$this->price?$this->price:0,
            'before_price'=>$this->before_price,
            'name'=>$this->name,
            'photo'=>$this->photo,
            'token'=>$this->token,
            'from'=> date_format($this->from,'d-m-Y'),
            'to'=> date_format($this->to,'d-m-Y'),
        ];
    }
}
