<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commerciale extends Model
{
    //

    protected $guarded = [];
    public $timestamps = false;

    protected $hidden = ['password'];


    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function commissions(){
        return $this->hasMany('App\Models\Commission','commerciale_id');
    }

    public function paiements(){
        return $this->hasMany('App\Models\Pcommission','commerciale_id');
    }

    public function getNameAttribute(){
        return $this->first_name .'  '.$this->last_name;
    }




}
