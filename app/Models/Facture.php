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

    public function getTvaAttribute(){
        $mt = 80000;
        return $mt*18/100;
    }

    public function getCaAttribute(){
        $tva = $this->tva;
        return $tva*5/100;
    }



    public function getMontantAttribute(){
        $mt = $this->total;
        if($this->with_tva){
            return $mt + $this->tva + $this->ca;
        }
        return $mt;
    }

    public function getTotalAttribute(){
        $mt = $this->lignes->reduce(function($carry,$item){
            return $carry + $item->montant;
        });

        return $mt;
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
        $data = ['color'=>'danger','name'=>'impayée','code'=>1];
        if($this->versement > 0){
            $data = ['color'=>'warning','name'=>'non soldée','code'=>2];
        }

        if($this->reste == 0){
            $data = ['color'=>'success','name'=>'soldée','code'=>3];
        }

        return $data;
    }

    public function getLogoAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host ."/img/logo.png";
        return $path;
    }

}
