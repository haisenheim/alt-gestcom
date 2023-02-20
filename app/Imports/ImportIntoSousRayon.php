<?php

namespace App\Imports;

use App\Models\Article;
use App\Models\Sousrayon;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportIntoSousRayon implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $sousrayon;


    public function __construct($id)
    {
        $this->sousrayon = Sousrayon::find($id);
    }

    public function model(array $row)
    {
        return new Article([
            //
            'code'=>$row[0],
            'name'=>$row[1],
            'rayon_id'=>$this->sousrayon->rayon_id,
            'sousrayon_id'=>$this->sousrayon->id,
            'fournisseur_id'=>auth()->user()->fournisseur_id
        ]);
    }
}
