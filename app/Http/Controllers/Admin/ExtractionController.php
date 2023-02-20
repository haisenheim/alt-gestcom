<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acte;
use App\Models\Category;
use App\Models\Consommation;
use App\Models\Courtier;
use App\Models\Entreprise;
use App\Models\Specialite;
use App\Models\Tprestataire;
use Illuminate\Http\Request;

class ExtractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $type_id = request()->type_id;
        $prestataire_id = request()->prestataire_id;
        $acte_id = request()->prestation_id;
        $client_id = request()->entreprise_id;
        $from = request()->from;
        $to = request()->to;
        $courtier_id = request()->courtier_id;
        $exercice_id = request()->exrecice_id;
        $agent_id = request()->assure_id;
        if(!$type_id && !$prestataire_id && !$acte_id && !$client_id && !$exercice_id && !$agent_id && !$from && !$to){
            $types = Tprestataire::all();
            $entreprises = Entreprise::all();
            $courtiers = Courtier::all();
            $actes = Acte::all();
            return view('/Admin/Extractions/index')->with(compact('types','entreprises','entreprises','courtiers','actes'));
        }else{
            $consommations = Consommation::all();
            /*if($type_id>0){
                $consommations = $consommations->where('type_id',$type_id);
            } */

           // dd($consommations);
            if($prestataire_id>0){
                $consommations = $consommations->where('prestataire_id',$prestataire_id);
               // dd($consommations);
            }
            if($client_id){
                $consommations = $consommations->where('entreprise_id',$client_id);
            }
            if($courtier_id){
                $consommations = $consommations->where('courtier_id',$courtier_id);
            }
            if($exercice_id){
                $consommations = $consommations->where('exercice_id',$exercice_id);
            }
            if($from && $to){
                $consommations = $consommations->where('created_at','>=',$from)->where('created_at','<=',$to);
            }

            if($acte_id){
                $consommations = $consommations->filter(function($item)use($acte_id){
                   if($item->prestation_id){
                    return $item->prestation->acte_id == $acte_id;
                   }
                   return false;
                });
            }

            $types = Tprestataire::all();
            $entreprises = Entreprise::all();
            $courtiers = Courtier::all();
            $actes = Acte::all();
            return view('/Admin/Extractions/index')->with(compact('types','entreprises','entreprises','courtiers','consommations','actes'));
        }


    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		//$projet = Creance::where('token',$token)->first();


		return view('/Consultant/Creances/show')->with(compact('projet'));
	}


}
