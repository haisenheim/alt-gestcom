<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use App\Models\Paiement;

class DashboardController extends Controller
{

	public function __invoke()
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
