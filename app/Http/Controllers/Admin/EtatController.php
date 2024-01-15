<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Depense;
use App\Models\Facture;
use App\Models\Paiement;
use Carbon\Carbon;
use PDF;

class EtatController extends Controller
{

    public function getGlobalForm(){
        return view('Admin/Etats/global_form');
    }

    public function getGlobalPrint(){
        $du = request()->du;
        $au = request()->au;

        $cpaiements = Paiement::where('created_at','>=',$du)->where('created_at','<=',$au)->where('fournisseur',0)->where('moi_id','>',0)->get();

        $cpaiements = $cpaiements->groupBy(function($item){
            return $item->mois->name.'/'.$item->annee;
        });

        $fpaiements = Paiement::where('created_at','>=',$du)->where('created_at','<=',$au)->where('fournisseur',1)->get();
        $fpaiements = $fpaiements->groupBy(function($item){
            return $item->mois->name.'/'.$item->annee;
        });

        $depenses = Depense::where('created_at','>=',$du)->where('created_at','<=',$au)->get();
        $depenses = $depenses->groupBy(function($item){
            return $item->mois->name.'/'.$item->annee;
        });

        $commissions = Commission::where('created_at','>=',$du)->where('created_at','<=',$au)->get();
        $commissions = $commissions->groupBy(function($item){
            return $item->mois->name.'/'.$item->annee;
        });

        $comdata = [];
        foreach($commissions as $k=>$v){
            $comdata[$k] = $v->reduce(function($c,$i){
                return $c + $i->montant;
            });
        }

        $depdata = [];
        foreach($depenses as $k=>$v){
            $depdata[$k] = $v->reduce(function($c,$i){
                return $c + $i->montant;
            });
        }

        $cdata = [];
        foreach($cpaiements as $k=>$v){
            $cdata[$k] = $v->reduce(function($c,$i){
                return $c + $i->montant;
            });
        }

        $fdata= [];
        foreach($fpaiements as $k=>$v){
            $fdata[$k] = $v->reduce(function($c,$i){
                return $c + $i->montant;
            });
        }

        //dd($fdata);

        $pf_dep_data = [];

        if(count($fdata)>count($depdata)){
            foreach($fdata as $fk=>$fv){
                foreach($depdata as $dk=>$dv){
                    if(isset($fdata[$dk])){
                        if(isset($depdata[$fk])){
                            $pf_dep_data[$fk] = $depdata[$fk]+$fdata[$fk];
                        }else{
                            $pf_dep_data[$fk] = $fdata[$fk];
                        }
                    }else{
                        $pf_dep_data[$dk] = $depdata[$dk];
                    }
                }
            }
        }else{
            foreach($depdata as $fk=>$fv){
                foreach($fdata as $dk=>$dv){
                    if(isset($depdata[$dk])){
                        if(isset($fdata[$fk])){
                            $pf_dep_data[$fk] = $fdata[$fk]+$depdata[$fk];
                        }else{
                            $pf_dep_data[$fk] = $depdata[$fk];
                        }
                    }else{
                        $pf_dep_data[$dk] = $fdata[$dk];
                    }
                }
            }
        }

        $sdata = [];
        if(count($pf_dep_data)>count($comdata)){
            foreach($pf_dep_data as $pdk=>$pdv){
                foreach($comdata as $ck=>$cv){
                    if(isset($pf_dep_data[$ck])){
                        if(isset($comdata[$pdk])){
                            $sdata[$pdk] = $pf_dep_data[$pdk]+$comdata[$ck];
                        }else{
                            $sdata[$pdk] = $pf_dep_data[$pdk];
                        }
                    }else{
                        $sdata[$ck] = $comdata[$ck];
                    }
                }
            }
        }else{
            foreach($comdata as $pdk=>$pdv){
                foreach($pf_dep_data as $ck=>$cv){
                    if(isset($comdata[$ck])){
                        if(isset($pf_dep_data[$pdk])){
                            $sdata[$pdk] = $pf_dep_data[$pdk]+$comdata[$ck];
                        }else{
                            $sdata[$pdk] = $comdata[$pdk];
                        }
                    }else{
                        $sdata[$ck] = $pf_dep_data[$ck];
                    }
                }
            }
        }

        //dd($sdata);
        $data = [];
        foreach($sdata as $k=>$v){
            if(isset($sdata[$k])){
                if(isset($cdata[$k])){
                    $data[$k] = ['s'=>$sdata[$k],'e'=>$cdata[$k],'p'=>($cdata[$k]-$sdata[$k])];
                   // break;
                }else{
                    $data[$k] = ['s'=>$sdata[$k],'e'=>0,'p'=>-1*$sdata[$k]];
                }
                //break;
            }else{
                $data[$k] = ['s'=>0,'e'=>$cdata[$k],'p'=>$cdata[$k]];
               // break;
            }
        }
       /*  if(count($sdata)>count($cdata)){
            //dd($sdata);
            foreach($sdata as $sk=>$sv){
                foreach($cdata as $ck=>$cv){
                    if(isset($sdata[$ck])){
                        if(isset($cdata[$sk])){
                            $data[$sk] = ['s'=>$sdata[$sk],'e'=>$cdata[$ck],'p'=>($cdata[$ck]-$sdata[$sk])];
                        }else{
                            $data[$sk] = ['s'=>$sdata[$sk],'e'=>0,'p'=>-1*$sdata[$sk]];
                        }
                    }else{
                        $data[$ck] = ['s'=>0,'e'=>$cdata[$ck],'p'=>$cdata[$ck]];
                    }
                }
            }
        }else{
            //dd($sdata);
            foreach($cdata as $ckx=>$sv){
                foreach($sdata as $skx=>$cv){
                    if(isset($cdata[$ckx])){
                        if(isset($sdata[$skx])){
                            $data[$skx] = ['e'=>$cdata[$ckx],'s'=>$sdata[$ckx],'p'=>($cdata[$ckx]-$sdata[$skx])];
                        }else{
                            $data[$ckx] = ['e'=>$cdata[$ckx],'s'=>0,'p'=>$cdata[$ckx]];
                        }
                    }else{
                        $data[$skx] = ['e'=>0,'s'=>$sdata[$skx],'p'=>-1*$sdata[$skx]];
                    }
                }
            }
        } */
        //dd($data);
        //return view('welcome');
        $pdf = PDF::loadView('Admin/Etats/global_pdf', compact('cdata','fdata','comdata','depdata','sdata','data'));
        return $pdf->stream('etat_global.pdf');
       //return view('Admin/Etats/pdfglobal')->with(compact('cdata','fdata','comdata','depdata','sdata','data'));
    }

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
            $mvts[$m]['entree'] = isset($all_paiements[$m])?$all_paiements[$m]->reduce(function($carry,$item){
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
