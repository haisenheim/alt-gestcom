<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];
    protected $table ='factures';

    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }

    public function fournisseur()
    {
        return $this->belongsTo('App\Models\Fournisseur');
    }

    public function lignes()
    {
        return $this->hasMany('App\Models\OrderLine');
    }

    public function getEncaissementAttribute(){
        return $this->paiements->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
    }

    public function getResteAttribute(){
        return $this->montant - $this->encaissement;
    }


    public function getStatusAttribute(){
        $data = ['name'=>'en attente','color'=>'warning'];
        if($this->cancelled_at){
            $data = ['name'=>'annulee','color'=>'danger'];
        }
        if($this->picking_transferred_at){
            $data = ['name'=>'en preparation','color'=>'info'];
        }

        return $data;
    }
}
