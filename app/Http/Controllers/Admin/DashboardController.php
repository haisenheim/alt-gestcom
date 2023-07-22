<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Pcommission;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __invoke(){

        $data = [];

       /* $ps = Paiement::all();
        foreach($ps as $p){
            if($p->facture){
                if($p->facture->client){
                    $p->facture->fournisseur = $p->facture->client->fournisseur;
                    $p->facture->save();
                    $p->fournisseur = $p->facture->client->fournisseur;
                    $p->save();
                }

            }
        } */

        //dd();

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

        $all_paiements = Paiement::where('annee',date('Y'))->where('fournisseur',0)->where('moi_id','>',0)->get();

        $all_paiements = $all_paiements->groupBy(function($item){
            return $item->mois->name;
        });

        $fpaiements = Paiement::where('annee',date('Y'))->where('fournisseur',1)->get();
        $fpaiements = $fpaiements->groupBy(function($item){
            return $item->mois->name;
        });


        $commissions = Commission::where('annee',date('Y'))->get();
        $cids = [];
        foreach($commissions as $facture){
            $cids[] = $facture->id;
        }

       // $pcommissions = Pcommission::whereIn('commission_id',$cids)->where('moi_id','>',0)->get();
       $pcommissions = Commission::where('annee',date('Y'))->get();
        $pcommissions = $pcommissions->groupBy(function($item){
            return $item->mois->name;
        });

        $commissions = $commissions->groupBy(function($item){
            return $item->mois->name;
        });

        //dd($paiements);
        $mois = ['JANVIER','FEVRIER','MARS','AVRIL','MAI','JUIN','JUILLET','AOUT','SEPTEMBRE','OCTOBRE','NOVEMBRE','DECEMBRE'];

        $data['paiements']=$paiements;
        $data['depenses']=$depenses;
        $data['fpaiements']=$fpaiements;
        $data['factures']=$factures;
        $data['commissions']=$commissions;
        $data['pcommissions']=$pcommissions;
        $data['all_paiements'] = $all_paiements;
        $mvts = [];

        foreach($mois as $m){
            $mvts[$m]['entree'] = isset($paiements[$m])?$paiements[$m]->reduce(function($carry,$item){
                return $carry + $item->montant;
            }):0;
            $mvts[$m]['sortie'] = 0;
            if(isset($fpaiements[$m])){
               // dd($fpaiements[$m]);
                $montant = $fpaiements[$m]->reduce(function($carry,$item){
                    return $carry + $item->montant;
                });
                //dd($montant);
                $mvts[$m]['sortie'] = $mvts[$m]['sortie'] + $montant;
            }
            if(isset($pcommissions[$m])){
                $mvts[$m]['sortie'] = $mvts[$m]['sortie'] + $pcommissions[$m]->reduce(function($carry,$item){
                    return $carry + $item->montant;
                });
            }
            if(isset($depenses[$m])){
                $mvts[$m]['sortie'] = $mvts[$m]['sortie'] + $depenses[$m]->reduce(function($carry,$item){
                    return $carry + $item->montant;
                });
            }
            $mvts[$m]['marge'] = $mvts[$m]['entree'] - $mvts[$m]['sortie'];
        }

        return view('Admin/dashboard')->with(compact('data','mvts'));
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
