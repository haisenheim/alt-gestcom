<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    //
    protected $guarded = [];


    public function fournisseur(){
        return $this->belongsTo('App\Models\Client','client_id');
    }

    public function facture(){
        return $this->belongsTo('App\Models\Facture','facture_id');
    }

    public function appros()
    {
        return $this->hasMany('App\Models\Approvisionnement','entree_id');
    }

    public function getMontantAttribute(){
        $mt = $this->appros->reduce(function($carry,$item){
            return $carry + $item->montant;
        });

        return $mt;
    }





    public function month(){
        return $this->belongsTo('App\Models\Moi','mois');
    }



}
