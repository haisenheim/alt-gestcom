<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pcommission extends Model
{
    //
    protected $guarded = [];

    public function commerciale(){
        return $this->belongsTo('App\Models\Commerciale','commerciale_id');
    }

    public function facture(){
        return $this->belongsTo('App\Models\Facture','facture_id');
    }

    public function commission(){
        return $this->belongsTo('App\Models\Commission','commission_id');
    }

    public function mois(){
        return $this->belongsTo('App\Models\Moi','moi_id');
    }

}
