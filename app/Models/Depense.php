<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    //
    protected $guarded = [];
    protected $dates = ['done_at'];

    public function type(){
        return $this->belongsTo('App\Models\Tdepense','deptype_id');
    }

    public function mois(){
        return $this->belongsTo('App\Models\Moi','moi_id');
    }


}
