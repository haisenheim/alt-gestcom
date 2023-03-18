<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;

class DashboardController extends Controller
{

    public function __invoke(){

        $data = [];

        $paiements = Paiement::where('annee',date('Y'))->where('fournisseur',0)->get();
        $paiements = $paiements->groupBy(function($item){
            return $item->mois->name;
        });

        $depenses = Depense::where('annee',date('Y'))->get();
        $depenses = $depenses->groupBy(function($item){
            return $item->mois->name;
        });

        $fpaiements = Paiement::where('annee',date('Y'))->where('fournisseur',1)->get();
        $fpaiements = $fpaiements->groupBy(function($item){
            return $item->mois->name;
        });

        //dd($paiements);

        $data['paiements']=$paiements;
        $data['depenses']=$depenses;
        $data['fpaiements']=$fpaiements;

        return view('Admin/dashboard')->with(compact('data'));
    }

	public function __invoke__()
	{
        $factures = Facture::where('annee',date('Y'))->get();
        $nbfy = $factures->count();
        $cay = $factures->reduce(function($carry,$item){
            return $carry + $item->montant;
        });

        $factures = $factures->where('moi_id',date('m'));
        $nbfm = $factures->count();
        $cam = $factures->reduce(function($carry,$item){
            return $carry + $item->montant;
        });

        $paiements = Paiement::where('annee',date('Y'))->get();
        $rcy = $paiements->reduce(function($carry,$item){
            return $carry + $item->montant;
        });

        $paiements = $paiements->where('moi_id',date('m'));
        $rcm = $paiements->reduce(function($carry,$item){
            return $carry + $item->montant;
        });



		return view('Admin/dashboard')->with(compact('nbfy','nbfm','cay','cam','rcm','rcy'));
	}
}
