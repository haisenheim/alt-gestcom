<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Acte;
use App\Models\ActePrestataire;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Prestataire;
use App\Models\PrestataireSpecialite;
use App\Models\Specialite;
use App\Models\Tprestataire;
use App\Models\Ville;
use App\User;
use Illuminate\Http\Request;

class PaiementController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paiements = Paiement::orderBy('created_at','DESC')->paginate(50);
        $clients = Client::all();
        return view('/Admin/Paiements/index')->with(compact('clients','paiements'));
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
        //dd($request->all());
        $facture = Facture::find($request->facture_id);
        $paiement = Paiement::create([
            'facture_id'=>$facture->id,
            'client_id'=>$facture->client_id,
            'montant'=>$request->montant,
            'reference'=>date('sihd-my'),
            'moi_id'=>date('m'),
            'annee'=>date('Y')
        ]);
        return back();
    }

    public function save(){
        $data = request()->except('image','_token');
        $id = request()->id;
        $image = request()->image;
        if($image){
            $path = $this->entityImgCreate($image,'fournisseurs',time());
            $data['image'] = $path;
        }

        $logo = request()->logo;
        if($logo){
            $path = $this->entityImgCreate($logo,'fournisseurs',sha1(time()));
            $data['logo_uri'] = $path;
        }
        Prestataire::updateOrCreate(['id'=>$id],$data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		//$projet = Creance::where('token',$token)->first();
        $fournisseur = Prestataire::where('token',$id)->first();
        $types = Tprestataire::all();
        $specialites = Specialite::all();
        $actes = Acte::all();
        $items = ActePrestataire::where('prestataire_id',$fournisseur->id)->get();
        //dd($fournisseur);
		return view('/Admin/Prestataires/show')->with(compact('fournisseur','types','specialites','actes','items'));
	}

    public function addSpecialite(){
        PrestataireSpecialite::create(request()->all());
        return back();
    }

    public function addActe(Request $request){
        $acte = ActePrestataire::where('acte_id',$request->acte_id)->where('prestataire_id',$request->prestataire_id)->first();
        if($acte){
            $acte->montant = $request->montant;
            $acte->save();
        }else{
            ActePrestataire::create(request()->all());
        }

        return back();
    }


}
