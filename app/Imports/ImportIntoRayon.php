<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportIntoRayon implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $rayon_id;

    public function __construct($id)
    {
        $this->rayon_id = $id;
    }

    public function model(array $row)
    {
        return new Article([
            //
            'code'=>$row[0],
            'name'=>$row[1],
            'price'=>is_numeric($row[2])?$row[2]:0,
            'rayon_id'=>$this->rayon_id,
            'fournisseur_id'=>auth()->user()->fournisseur_id
        ]);
    }
}
