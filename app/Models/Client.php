<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable implements JWTSubject
{
    //
    use Notifiable;

    protected $guarded = [];

    protected $hidden = ['password'];

    public function factures()
    {
        return $this->hasMany('App\Models\Facture','client_id');
    }



    public function paiements(){
        return $this->hasMany('App\Models\Paiement','client_id');
    }





    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
