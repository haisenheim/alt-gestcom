<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Paiement;
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
        $paiements = Paiement::orderBy('created_at','DESC')->where('fournisseur',0)->paginate(50);
       /*  $paiements = Paiement::orderBy('created_at','DESC')->where('fournisseur',0)->get();
        foreach($paiements as $p){
            $f = Facture::find($p->facture_id);
            if($f){
                $p->client_id = $f->client_id;
                $p->save();
            }
        }
        dd('ok'); */
        $clients = Client::all();
        return view('/Admin/Paiements/index')->with(compact('clients','paiements'));
    }

    public function showBlock(){
        $du = request()->du;
        $au = request()->au;

       // dd(request()->all());
        if($du && $au){
            $paiements = Paiement::whereBetween('created_at',[$du,$au])->get();
            //dd($paiements);
            if(request()->client_id){
                //dd($paiements);
                $paiements = $paiements->where('client_id',request()->client_id);
                //dd($paiements);
                $client = Client::find(request()->client_id);
                return view('/Admin/Paiements/show_block')->with(compact('client','paiements'));
            }
           return view('/Admin/Paiements/show_block')->with(compact('paiements'));
        }
        return back();

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
            'annee'=>date('Y'),
            'fournisseur'=>$facture->fournisseur,
        ]);
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

	}




}
