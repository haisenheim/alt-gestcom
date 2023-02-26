<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    //
    protected $guarded = ['id'];
    protected $table = 'approvisionnements';
    public $timestamps = false;

    public function article(){
       return $this->belongsTo('App\Models\Article');
    }

    public function entree(){
        return $this->belongsTo('App\Models\Entree');
     }



     public function getMontantAttribute(){
       return $this->pa * $this->quantite;

     }
}
