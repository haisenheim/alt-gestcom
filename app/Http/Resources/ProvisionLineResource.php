<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvisionLineResource extends JsonResource
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
            'product'=>new ProductResource($this->article),
            'available'=>$this->available?true:false,
            'quantity'=>(int)$this->quantity,
            'ago'=>\Carbon\Carbon::parse($this->updated_at)->diff(\Carbon\Carbon::now())->d
        ];
    }
}
