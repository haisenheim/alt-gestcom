<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    //
    protected $guarded = [];


    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function delai(){
        return $this->belongsTo('App\Models\Delai');
    }

    public function paiements()
    {
        return $this->hasMany('App\Models\Paiement');
    }

    public function lignes()
    {
        return $this->hasMany('App\Models\LigneFacture');
    }

    public function getMontantAttribute(){
        return $this->lignes->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
    }

    public function getVersementAttribute(){
        return $this->paiements->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
    }

    public function getResteAttribute(){
        return ($this->montant > $this->versement)?$this->montant - $this->versement:0;
    }

    public function month(){
        return $this->belongsTo('App\Models\Moi','mois');
    }

    public function getStatusAttribute(){
        $data = ['color'=>'danger','name'=>'impayée'];
        if($this->versement > 0){
            $data = ['color'=>'warning','name'=>'non soldée'];
        }

        if($this->reste == 0){
            $data = ['color'=>'success','name'=>'soldée'];
        }

        return $data;
    }

}
