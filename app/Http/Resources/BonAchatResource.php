<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BonAchatResource extends JsonResource
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
            'expired_at'=>date_format($this->expired_at,'d/m/Y'),
            'token'=>$this->token,
            'carte_id'=>$this->carte_id,
            'montant'=>number_format($this->montant,0,',','.'),
            'client_id'=>$this->client_id,
        ];
    }
}
