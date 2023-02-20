<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    //
    protected $guarded = [];

    public function prestataires()
    {
        return $this->hasMany('App\Models\Prestataire');
    }

    public function entreprises()
    {
        return $this->hasMany('App\Models\Entreprise');
    }


}
