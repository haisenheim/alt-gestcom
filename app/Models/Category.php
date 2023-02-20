<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //


    protected $guarded = [];
    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany('App\Models\Article','category_id');
    }

    public function getPhotoAttribute(){
        $host = request()->getSchemeAndHttpHost();
        $path = $host ."/img/".$this->image;
        return $path;
    }
}
