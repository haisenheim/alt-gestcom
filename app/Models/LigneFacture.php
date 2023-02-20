<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneFacture extends Model
{
    //
    protected $guarded = ['id'];
    protected $table = 'lignes';
    public $timestamps = false;

    public function article(){
       return $this->belongsTo('App\Models\Article');
    }

    public function facture(){
        return $this->belongsTo('App\Models\Facture');
     }



     public function getMontantAttribute(){
       return $this->pu * $this->quantite;

     }
}
