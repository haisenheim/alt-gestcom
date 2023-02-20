<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
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
            'fournisseur'=>new FournisseurListResource($this->fournisseur),
            'owner'=>new UserResource($this->client),
            'caissier'=>new UserResource($this->user),
            'total'=>$this->total
        ];
    }
}
