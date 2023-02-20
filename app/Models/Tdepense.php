<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tdepense extends Model
{
    //
    protected $guarded = [];
    protected $table ='deptypes';
    public $timestamps = false;

    public function depenses()
    {
        return $this->hasMany('App\Models\Depense','deptype_id');
    }

    public function getMontantAttribute(){
        return $this->depenses->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
    }


}
