<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $guarded = [];
    protected $connection = 'mysql2';

    public function categorie(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
