<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Assure;
use App\Models\Carte;
use App\Models\College;
use App\Models\Consommation;
use App\Models\Courtier;
use App\Models\Entreprise;
use App\Models\Exercice;
use App\Models\Lot;
use App\Models\Secteur;
use App\Models\Ville;
use Illuminate\Http\Request;

class EntrepriseController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entreprises = Entreprise::all();
        $villes = Ville::all();
        $secteurs = Secteur::all();
        return view('/Admin/Entreprises/index')->with(compact('entreprises','villes','secteurs'));
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
        $data = $request->all();
        $data['token'] = sha1(time());
        Entreprise::create($request->all());
        return redirect()->back();
    }

    public function addExercice(Request $request){
        $exercice = Exercice::create([
            'from'=>$request->from,
            'to'=>$request->to,
            'prime'=>$request->prime,
            'entreprise_id'=>$request->entreprise_id,
            'courtier_id'=>$request->courtier_id,
        ]);

        return back();
    }

    public function createCollege(Request $request){
        $data = $request->all();
        $data['token'] = sha1(time());
        College::create($data);
        return back();
    }

    public function generateCards(Request $request){
        $quantity = $request->quantity;
        $entreprise_id = $request->entreprise_id;
        for($i=1;$i<=$quantity;$i++){
            Carte::create([
                'name'=>str_pad($entreprise_id,3,'0',STR_PAD_RIGHT).str_pad($i,3,'0').date('Wdi'),
                'entreprise_id'=>$entreprise_id,
                'token'=>sha1(time().$i),
                'mois'=>date('m'),
                'annee'=>date('Y'),
            ]);
        }

        return back();
    }

    public function allocateCard(Request $request){
        $card = Carte::where('name',trim($request->name))->first();
       // dd($card);
        if(!$card){
            $request->session()->flash('danger','Carte invalide');
            return back();
        }

        if($card->allocated_at || $card->locked_at){
            $request->session()->flash('danger','Carte invalide');
            return back();
        }
        $card->allocated_at = new \DateTime();
        $card->allocated_by = auth()->user()->id;
        $card->assure_id = $request->assure_id;
        $card->save();
        return back();

    }

    public function createAgent(Request $request){
        $data = $request->except('photo');
        $photo = $request->photo;
        if($photo){
            $data['photo'] = $this->resize($photo,'img/entreprises/agents',240,240);
        }
        $data['agent'] = 1;
        $data['token'] = sha1(time().$request->entreprise_id);
        $agent = Assure::create($data);
        return back();
    }
    public function createAyant(Request $request){
        $data = $request->except('photo','cojoint');
        $photo = $request->photo;
        if($photo){
            $data['photo'] = $this->resize($photo,'img/entreprises/agents',240,240);
        }
        if( isset($request->cojoint)){
            $data['conjoint'] = 1;
        }
        else{
            $data['enfant'] = 1;
        }

        $data['token'] = sha1(time().$request->entreprise_id);
        $agent = Assure::create($data);
        return back();
    }

    public function getAgent($token){
        $agent = Assure::where('token',$token)->first();
        return view('/Admin/Entreprises/assure')->with(compact('agent'));
    }

    public function getPolice($id){
        $exercice = Exercice::find($id);
        return view('/Admin/Entreprises/police')->with(compact('exercice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		$fournisseur = Entreprise::where('token',$token)->first();
        $courtiers = Courtier::all();
		return view('/Admin/Entreprises/show')->with(compact('fournisseur','courtiers'));
	}

    public function getConsommationsByFamilleExercice($id,$exercice_id){
        $agent = Assure::find($id);
        $consommations = Consommation::select('*')
                        ->where('assure_id',$id)
                        ->where('exercice_id',$exercice_id)
                        ->get();

        $ayants = Assure::where('parent_id',$id)->get();
        foreach($ayants as $ayant){
            $cms = $ayant->consommations->where('exercice_id',$exercice_id);
            $consommations = $consommations->merge($cms);
        }
        return view('/Admin/Entreprises/famille')->with(compact('consommations','agent'));

    }

    public function getLot($token){
        $lot = Lot::where('token',$token)->first();
        return view('/Admin/Entreprises/lot')->with(compact('lot'));
    }

    public function getCarte($token){
        $carte = Carte::where('token',$token)->first();
        return view('/Admin/Entreprises/carte')->with(compact('carte'));
    }


}
