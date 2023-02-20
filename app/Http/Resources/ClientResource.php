<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'first_name'=>$this->first,
            'last_name' => $this->last_name,
            'phone'=>$this->phone,
            'photo'=>$this->photo,
            'name'=>$this->name,
            'nbchildren'=>$this->nbchildren,
            'ville'=>$this->ville,
            'email'=>$this->email,
            'code'=>$this->code,
            
        ];
    }
}
