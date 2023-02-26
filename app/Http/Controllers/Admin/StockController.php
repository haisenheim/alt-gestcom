<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\Client;
use App\Models\Delai;
use App\Models\Entree;
use App\Models\Facture;
use App\Models\LigneFacture;
use App\Models\Paiement;
use Illuminate\Http\Request;
use PDF;

class StockController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $factures = Entree::orderBy('created_at','DESC')->paginate(50);
        $clients = Client::where('fournisseur',1)->get();
        $articles = Article::all();

        return view('/Admin/Stock/index')->with(compact('factures','clients','articles'));
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
		$facture = Entree::find($id);
        $clients = Client::where('fournisseur',1)->get();
        $articles = Article::all();
        return view('/Admin/Stock/edit')->with(compact('facture','clients','articles'));
	}

    public function save(Request $request)
    {
        //
        $lignes = $request->lignes;
        $facture = Entree::find($request->facture_id);
        if($request->client_id){
            $facture->client_id = $request->client_id;
            $facture->save();
        }
        if($request->delai_id){
            $facture->delai_id = $request->delai_id;
            $facture->save();
        }
        Approvisionnement::where('facture_id',$facture->id)->delete();
        for($i=0;$i<count($lignes);$i++){
            $ligne = Approvisionnement::create([
                'facture_id'=>$facture->id,
                'article_id'=>$lignes[$i]['id'],
                'pu'=>$lignes[$i]['pu'],
                'quantite'=>$lignes[$i]['qty'],
            ]);
        }

        return response()->json($facture->id);
    }

    public function imprimer($id){
        $facture = Entree::find($id);
        $pdf = PDF::loadView('Admin/Stock/pdf', [
            'facture' => $facture
        ]);

        return $pdf->stream('appro.pdf');
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
            'fournisseur'=>1,
        ]);

        $entree = Entree::create([
            'client_id'=>$request->client_id?$request->client_id:0,
            'name'=>'CHTV'.date('sihd/my'),
            'moi_id'=>date('m'),
            'annee'=>date('Y'),
            'facture_id'=>$facture->id,
        ]);

        for($i=0;$i<count($lignes);$i++){
            $ligne = Approvisionnement::create([
                'entree_id'=>$entree->id,
                'article_id'=>$lignes[$i]['id'],
                'pa'=>$lignes[$i]['pu'],
                'quantite'=>$lignes[$i]['qty'],
            ]);
        }

        for($i=0;$i<count($lignes);$i++){
            $ligne = LigneFacture::create([
                'facture_id'=>$facture->id,
                'article_id'=>$lignes[$i]['id'],
                'pu'=>$lignes[$i]['pu'],
                'quantite'=>$lignes[$i]['qty'],
            ]);
        }
        return response()->json($entree->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		$facture = Entree::find($id);
		return view('/Admin/Stock/show')->with(compact('facture'));
	}


}
