<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function lignes()
    {
        return $this->hasMany('App\Models\OrderLine');
    }


}
