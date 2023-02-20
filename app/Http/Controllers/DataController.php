<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\Exercice;
use App\Models\Prestataire;

class DataController extends Controller
{
    public function getPrestatairesByType($id){
       $prest = Prestataire::where('type_id',$id)->get();
        return response()->json($prest);
    }

    public function getDataByEntreprise($id){
        $assures = Assure::where('entreprise_id',$id)->where('agent',1)->get();
        $exercices = Exercice::where('entreprise_id',$id)->get();
         return response()->json(['agents'=>$assures,'exercices'=>$exercices]);
     }



}
