<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __invoke(){

        $data = [];

        $ps = Paiement::all();
        foreach($ps as $p){
            if($p->facture){
                $p->fournisseur = $p->facture->fournisseur;
            }
        }

        dd();

        //$paiements = Paiement::where('annee',date('Y'))->where('fournisseur',0)->get();


        $depenses = Depense::where('annee',date('Y'))->get();
        $depenses = $depenses->groupBy(function($item){
            return $item->mois->name;
        });
        $now = Carbon::now();
        $fd = $now->firstOfYear();
        //dd($fd);
        $factures = Facture::where('created_at','>=',$fd)->where('fournisseur',0)->where('statut',1)->get();
        $ids = [];
        foreach($factures as $facture){
            $ids[] = $facture->id;
        }

        $factures = $factures->groupBy(function($item){
            return $item->mois->name;
        });
        $paiements = Paiement::whereIn('facture_id',$ids)->where('moi_id','>',0)->get();
        //dd($paiements);
        $paiements = $paiements->groupBy(function($item){
            return $item->mois?$item->mois->name:'-';
        });

        $fpaiements = Paiement::where('annee',date('Y'))->where('fournisseur',1)->get();
        $fpaiements = $fpaiements->groupBy(function($item){
            return $item->mois->name;
        });

        //dd($paiements);

        $data['paiements']=$paiements;
        $data['depenses']=$depenses;
        $data['fpaiements']=$fpaiements;
        $data['factures']=$factures;

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
