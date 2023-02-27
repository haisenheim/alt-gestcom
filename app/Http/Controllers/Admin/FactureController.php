<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Article;
use App\Models\Client;
use App\Models\Delai;
use App\Models\Facture;
use App\Models\LigneFacture;
use App\Models\Paiement;
use Illuminate\Http\Request;
use PDF;

class FactureController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $factures = Facture::orderBy('created_at','DESC')->where('fournisseur',0)->where('statut',1)->paginate(50);
        $clients = Client::where('fournisseur',0)->get();
        $articles = Article::all();
        $delais = Delai::all();

        return view('/Admin/Factures/index')->with(compact('factures','clients','articles','delais'));
    }

    public function getFacturesFrn()
    {

        $factures = Facture::orderBy('created_at','DESC')->where('fournisseur',1)->where('statut',1)->paginate(50);
        $clients = Client::where('fournisseur',1)->get();
        $articles = Article::all();
        $delais = Delai::all();

        return view('/Admin/Factures/fournisseurs')->with(compact('factures','clients','articles','delais'));
    }

    public function getProformas()
    {

        $factures = Facture::orderBy('created_at','DESC')->where('fournisseur',0)->where('statut',0)->paginate(50);
        $clients = Client::where('fournisseur',0)->get();
        $articles = Article::all();
        $delais = Delai::all();

        return view('/Admin/Factures/proformas')->with(compact('factures','clients','articles','delais'));
    }

    public function addPaiement(Request $request){
        Paiement::create([
            'facture_id'=>$request->facture_id,
            'montant'=>$request->montant,
            'user_id'=>auth()->user()->id,
        ]);

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

    public function edit($id)
	{
		$facture = Facture::find($id);
        $clients = Client::all();
        $articles = Article::all();
        $delais = Delai::all();
        return view('/Admin/Factures/edit')->with(compact('facture','clients','articles','delais'));
	}

    public function save(Request $request)
    {
        //
        $lignes = $request->lignes;
        $facture = Facture::find($request->facture_id);
        if($request->client_id){
            $facture->client_id = $request->client_id;
            $facture->save();
        }
        if($request->delai_id){
            $facture->delai_id = $request->delai_id;
            $facture->save();
        }
        LigneFacture::where('facture_id',$facture->id)->delete();
        for($i=0;$i<count($lignes);$i++){
            $ligne = LigneFacture::create([
                'facture_id'=>$facture->id,
                'article_id'=>$lignes[$i]['id'],
                'pu'=>$lignes[$i]['pu'],
                'quantite'=>$lignes[$i]['qty'],
            ]);
        }

        return response()->json($facture->id);
    }

    public function imprimer($id){
        $facture = Facture::find($id);
        if($facture->statut){
            $pdf = PDF::loadView('Admin/Factures/pdf', [
                'facture' => $facture
            ]);
        }else{
            $pdf = PDF::loadView('Admin/Factures/proforma_pdf', [
                'facture' => $facture
            ]);
        }


        return $pdf->stream('sample.pdf');
    }

    public function printBlock(){
        $du = request()->du;
        $au = request()->au;

       // dd(request()->all());
        if($du && $au){
            $factures = Facture::whereBetween('created_at',[$du,$au])->get();
            if(request()->client_id){
                $factures = $factures->where('client_id',request()->client_id);
            }
            if(request()->type_id){
                $factures = $factures->filter(function($item){
                    return $item->status['code'] == request()->type_id;
                });
            }
            $client = Client::find(request()->client_id);
           // dd($factures);
            $pdf = PDF::loadView('Admin/Factures/pdf_block',compact('factures','client'));

            return $pdf->stream('factures.pdf');
        }
        return back();

    }

    public function enableTva($id){
        $facture = Facture::find($id);
        $facture->with_tva = 1;
        $facture->save();
        return back();
    }

    public function disableTva($id){
        $facture = Facture::find($id);
        $facture->with_tva = 0;
        $facture->save();
        return back();
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
        $lignes = $request->lignes;
        $facture = Facture::create([
            'client_id'=>$request->client_id?$request->client_id:0,
            'reference'=>'CHTV'.date('sihd/my'),
            'moi_id'=>date('m'),
            'annee'=>date('Y'),
            'delai_id'=>$request->delai_id,
            'statut'=>1,
            'user_id'=>auth()->user()->id,
            'client_name'=>$request->name,
        ]);
        for($i=0;$i<count($lignes);$i++){
            $ligne = LigneFacture::create([
                'facture_id'=>$facture->id,
                'article_id'=>$lignes[$i]['id'],
                'pu'=>$lignes[$i]['pu'],
                'quantite'=>$lignes[$i]['qty'],
            ]);
        }

        if($request->client_id==0){
            Paiement::create([
                'facture_id'=>$facture->id,
                'montant'=>$facture->montant,
                'user_id'=>auth()->user()->id,
                'reference'=>date('sihd-my'),
                'moi_id'=>date('m'),
                'annee'=>date('Y')
            ]);
        }

        return response()->json($facture->id);
    }

    public function saveProforma(Request $request)
    {
        //
        $lignes = $request->lignes;
        $facture = Facture::create([
            'client_id'=>$request->client_id?$request->client_id:0,
            'reference'=>'CHTV'.date('sihd/my'),
            'moi_id'=>date('m'),
            'annee'=>date('Y'),
            'delai_id'=>$request->delai_id,
            'statut'=>0,
            'user_id'=>auth()->user()->id,
            'client_name'=>$request->name,
        ]);
        for($i=0;$i<count($lignes);$i++){
            $ligne = LigneFacture::create([
                'facture_id'=>$facture->id,
                'article_id'=>$lignes[$i]['id'],
                'pu'=>$lignes[$i]['pu'],
                'quantite'=>$lignes[$i]['qty'],
            ]);
        }

        return response()->json($facture->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		$facture = Facture::find($id);
		return view('/Admin/Factures/show')->with(compact('facture'));
	}

    public function showProforma($id)
	{
		$facture = Facture::find($id);
		return view('/Admin/Factures/proforma')->with(compact('facture'));
	}

    public function valider($id)
	{
		$facture = Facture::find($id);
        $facture->statut = 1;
        $facture->save();
		return redirect('admin/factures/'.$facture->id);
	}


}
