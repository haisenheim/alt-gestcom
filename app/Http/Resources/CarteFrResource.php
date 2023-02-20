<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarteFrResource extends JsonResource
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
            'token'=>$this->token,
            'owner'=>new ClientResource($this->client),
            'solde' => $this->montant?$this->montant:0,
        ];
    }
}
