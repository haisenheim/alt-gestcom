<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    //
    protected $guarded = [];

    public function commerciale(){
        return $this->belongsTo('App\Models\Commerciale','commerciale_id');
    }

    public function facture(){
        return $this->belongsTo('App\Models\Facture','facture_id');
    }

    public function paiements(){
        return $this->hasMany('App\Models\Pcommission','commission_id');
    }

    public function getVersementAttribute(){
        return $this->paiements->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
    }

    public function getResteAttribute(){
        return ($this->montant > $this->versement)?$this->montant - $this->versement:0;
    }

    public function mois(){
        return $this->belongsTo('App\Models\Moi','moi_id');
    }



}
