<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Carte;
use App\Models\Intervalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KpiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private $_mois = [
        1=>'JAN',
        2=>'FEV',
        3=>'MARS',
        4=>'AVR',
        5=>'MAI',
        6=>'JUIN',
        7=>'JUIL',
        8=>'AOUT',
        9=>'SEPT',
        10=>'OCT',
        11=>'NOV',
        12=>'DEC'
    ];



    public function getFournisseurIntervalles(){

        $m = date('m');
        $weeks = [];
        $now = Carbon::now();
        $first = Carbon::now()->firstOfMonth();
        $f = $first;
        $intervalles = Intervalle::where('fournisseur_id',auth()->user()->fournisseur_id)->where('active',1)->get();
        $semaines = [];
        $i=1;
        do{

            $end = $first->clone();
            $end = $end->addDays(6);
            $t = $end>=$now?$now:$end;
            $key = date_format($first,'d-m-y').'_'.date_format($t,'d-m-y');
            $semaines['semaine '.$i++]=$key;
            $achats = Achat::whereBetween('created_at',[$f,$t])->get();
            $groups = $achats->groupBy('carte_id');
            $groups = $groups->map(function($group){
                return $group->reduce(function($carry,$item){
                    return $carry + $item->montant;
                });
            });

            $grouped = $groups->groupBy(function($group)use($intervalles){
                $retour = "0-0";
                    foreach($intervalles as $inter){
                            if($group>=$inter->min && $group<$inter->max){
                                $retour = $inter->high?">".round($inter->min/1000)."K":round($inter->min/1000) . "K - " . round($inter->max/1000) ."K";
                            }
                    }
                  return $retour;
               });
               $grouped = $grouped->map(function($group){
                    return $group->count();
               });
           /* $redAchats = $achats->reduce(function($carry, $item){
                return $carry + $item->montant;
            }); */
            $weeks[$key] = $grouped;
            $first = $end->clone();
            $first = $first->addDays(1);

        }while ($end<=$now);
        //dd($semaines);
        
        return response()->json(['semaines'=>$semaines,'data'=>$weeks]);

        $achats = Achat::where('annee',date('Y'))->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
        //$achats = Achat::where('annee',date('Y'))->where('fournisseur_id',5)->get();


        $previous = Achat::whereMonth( 'created_at', '=', Carbon::now()->subMonth()->month)->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
        $currents = Achat::whereMonth( 'created_at', '=', Carbon::now()->month)->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
        $crts = $previous->groupBy('carte_id');
         $nb = $crts->count();
         $montant = $previous->reduce(function($carry,$item){
             return $carry + $item->montant;
         });
        $previous_panier = $nb?$montant/$nb:0;

         $crts = $currents->groupBy('carte_id');
         $nb = $crts->count();
         $montant = $currents->reduce(function($carry,$item){
             return $carry + $item->montant;
         });
        $current_panier = $nb?$montant/$nb:0;

        $progress = $previous_panier>0?round(($current_panier - $previous_panier)*100/$previous_panier,1):0;


       // $achats = Achat::where('facture_id',$this->id)->where('annee',$this->annee)->where('mois',$this->mois)->get();
       $intervalles = Intervalle::where('fournisseur_id',auth()->user()->fournisseur_id)->where('active',1)->get();

       $clients = $currents->groupBy(function($item){
            return $item->client?$item->client->name:'Inconnu';
        });

        $clients = $clients->map(function($client){
             return $client->reduce(function($carry, $achat){
                 return $carry + $achat->montant;
             });
        });

        $grouped = $clients->groupBy(function($client)use($intervalles){
         $retour = "0-0";
             foreach($intervalles as $inter){
                     if($client>=$inter->min && $client<$inter->max){
                         $retour = $inter->high?">".round($inter->min/1000)."K":round($inter->min/1000) . "K - " . round($inter->max/1000) ."K";
                     }
             }
           return $retour;
        });
        $grouped = $grouped->map(function($group){
             return $group->count();
        });

        $clients = $previous->groupBy(function($item){
             return $item->client?$item->client->name:'Inconnu';
         });

         $clients = $clients->map(function($client){
             return $client->reduce(function($carry, $achat){
                 return $carry + $achat->montant;
             });
         });

     $prev_grouped = $clients->groupBy(function($client)use($intervalles){
      $retour = "0-0";
          foreach($intervalles as $inter){
                  if($client>=$inter->min && $client<$inter->max){
                     $retour = $inter->high?">".round($inter->min/1000)."K":round($inter->min/1000) . "K - " . round($inter->max/1000) ."K";
                  }
          }
        return $retour;
     });
     $prev_grouped = $prev_grouped->map(function($group){
          return $group->count();
     });
     $tranches = $grouped->map(function($grp,$key)use($prev_grouped){
         $perf=$prev_grouped[$key]>0?round(($grp-$prev_grouped[$key])*100/$prev_grouped[$key],1):0;
         return [
             'count'=>$grp,
             'prev'=>$prev_grouped[$key],
             'progression'=>$perf."%",
             'fa'=>$perf>0?'fa fa-arrow-up text-success':'fa fa-arrow-down text-danger',
             'text'=>$perf>0?'text-success':'text-danger',
         ];
     });



        $mois =  $this->_mois;
        $group_achats = $achats->groupBy(function($item) use($mois){
         return $mois[$item->mois];
        });
         $groups = $group_achats->map(function($items){
             return $items->reduce(function($carry,$item){
                 return $carry + $item->montant;
             });
         });
         $data = [
             'ventes'=>$groups,
             'panier'=>[
                 'montant'=>round($current_panier/1000,1)."K",
                 'prev_montant'=>round($previous_panier/1000,1)."K",
                 'prog'=>$progress.'%',
                 'fa'=>$progress>0?'fa fa-arrow-up text-success':'fa fa-arrow-down text-danger',
                 'text'=>$progress>0?'text-success':'text-danger',
             ],
             'tranches'=>$tranches,
         ];
         return response()->json($data);
        // dd($groups);

     }


    public function getFournisseurVentes(){
       $achats = Achat::where('annee',date('Y'))->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
       //$achats = Achat::where('annee',date('Y'))->where('fournisseur_id',5)->get();
       $previous = Achat::whereMonth( 'created_at', '=', Carbon::now()->subMonth()->month)->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
       $currents = Achat::whereMonth( 'created_at', '=', Carbon::now()->month)->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
       $crts = $previous->groupBy('carte_id');
        $nb = $crts->count();
        $montant = $previous->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
       $previous_panier = $nb?$montant/$nb:0;

        $crts = $currents->groupBy('carte_id');
        $nb = $crts->count();
        $montant = $currents->reduce(function($carry,$item){
            return $carry + $item->montant;
        });
       $current_panier = $nb?$montant/$nb:0;

       $progress = $previous_panier>0?round(($current_panier - $previous_panier)*100/$previous_panier,1):0;



       //---------------------------------------------------------------


      // $achats = Achat::where('facture_id',$this->id)->where('annee',$this->annee)->where('mois',$this->mois)->get();
      $intervalles = Intervalle::where('fournisseur_id',auth()->user()->fournisseur_id)->where('active',1)->get();

      $clients = $currents->groupBy(function($item){
           return $item->client?$item->client->name:'Inconnu';
       });

       $clients = $clients->map(function($client){
            return $client->reduce(function($carry, $achat){
                return $carry + $achat->montant;
            });
       });

       $grouped = $clients->groupBy(function($client)use($intervalles){
        $retour = "0-0";
            foreach($intervalles as $inter){
                    if($client>=$inter->min && $client<$inter->max){
                        $retour = $inter->high?">".round($inter->min/1000)."K":round($inter->min/1000) . "K - " . round($inter->max/1000) ."K";
                    }
            }
          return $retour;
       });
       $grouped = $grouped->map(function($group){
            return $group->count();
       });

       $clients = $previous->groupBy(function($item){
            return $item->client?$item->client->name:'Inconnu';
        });

        $clients = $clients->map(function($client){
            return $client->reduce(function($carry, $achat){
                return $carry + $achat->montant;
            });
        });

    $prev_grouped = $clients->groupBy(function($client)use($intervalles){
     $retour = "0-0";
         foreach($intervalles as $inter){
                 if($client>=$inter->min && $client<$inter->max){
                    $retour = $inter->high?">".round($inter->min/1000)."K":round($inter->min/1000) . "K - " . round($inter->max/1000) ."K";
                 }
         }
       return $retour;
    });
    $prev_grouped = $prev_grouped->map(function($group){
         return $group->count();
    });
    $tranches = $grouped->map(function($grp,$key)use($prev_grouped){
        $perf=$prev_grouped[$key]>0?round(($grp-$prev_grouped[$key])*100/$prev_grouped[$key],1):0;
        return [
            'count'=>$grp,
            'prev'=>$prev_grouped[$key],
            'progression'=>$perf."%",
            'fa'=>$perf>0?'fa fa-arrow-up text-success':'fa fa-arrow-down text-danger',
            'text'=>$perf>0?'text-success':'text-danger',
        ];
    });


       //dd($grouped);


       //---------------------------------------------------------------------









       $mois =  $this->_mois;
       $group_achats = $achats->groupBy(function($item) use($mois){
        return $mois[$item->mois];
       });
        $groups = $group_achats->map(function($items){
            return $items->reduce(function($carry,$item){
                return $carry + $item->montant;
            });
        });
        $data = [
            'ventes'=>$groups,
            'panier'=>[
                'montant'=>round($current_panier/1000,1)."K",
                'prev_montant'=>round($previous_panier/1000,1)."K",
                'prog'=>$progress.'%',
                'fa'=>$progress>0?'fa fa-arrow-up text-success':'fa fa-arrow-down text-danger',
                'text'=>$progress>0?'text-success':'text-danger',
            ],
            'tranches'=>$tranches,
        ];
        return response()->json($data);
       // dd($groups);

    }



    public function getFournisseurCartes(){
        $cartes = Carte::where('annee',date('Y'))->where('fournisseur_id',auth()->user()->fournisseur_id)->get();
        $previousAchats = Achat::whereMonth(
                            'created_at', '=', Carbon::now()->subMonth()->month
                        )
                        ->where('fournisseur_id',auth()->user()->fournisseur_id)
                        ->get();
        $previousCartesActives = $previousAchats->groupBy('carte_id')->count();

        $currentAchats = Achat::whereMonth(
                            'created_at', '=', Carbon::now()->month
                        )
                        ->where('fournisseur_id',auth()->user()->fournisseur_id)
                        ->get();

        $currentGroup = $currentAchats->groupBy('carte_id');
        $currentCartesActives = $currentGroup->count();
        $currentCashback = $currentAchats->reduce(function($carry,$item){
            return $carry + $item->cashback;
        });
        $previousCashback = $previousAchats->reduce(function($carry,$item){
            return $carry + $item->cashback;
        });
        $progressionCashback = $previousCashback?round(($currentCashback - $previousCashback)*100/$previousCashback,1):0;

        $mois =  $this->_mois;
        $cartes = $cartes->groupBy(function($item)use($mois){
            return $mois[$item->mois];
        });

        $previousMonth = Carte::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->count();

        $currentMonth =  Carte::whereMonth(
            'created_at', '=', Carbon::now()->month
        )->count();

        $progressionCreated = $previousMonth?round(($currentMonth - $previousMonth)*100/$previousMonth,1):0;
        $progressionActive = $previousCartesActives?round(($currentCartesActives - $previousCartesActives)*100/$previousCartesActives,1):0;
        $cartes = $cartes->map(function($items){
            return $items->count();
        });
        $data = [
            'cartes'=>$cartes,
            'active'=>[
                'nb'=>$currentCartesActives,
                'prog'=>$progressionActive.'%',
                'fa'=>$progressionActive>0?'fa fa-arrow-up text-success':'fa fa-arrow-down text-danger',
                'text'=>$progressionActive>0?'text-success':'text-danger',
            ],
            'cashback'=>[
                'nb'=>round($currentCashback/1000000,2)."M",
                'prog'=>$progressionCashback.'%',
                'fa'=>$progressionCashback>0?'fa fa-arrow-up text-success':'fa fa-arrow-down text-danger',
                'text'=>$progressionCashback>0?'text-success':'text-danger',
            ],
            'created'=>[
                'nb'=>number_format($currentMonth,0,',',' '),
                'prog'=>$progressionCreated.'%',
                'fa'=>$progressionCreated>0?'fa fa-arrow-alt-circle-up text-success':'fa fa-arrow-alt-circle-down text-danger',
                'text'=>$progressionCreated>0?'text-success':'text-danger',
            ],
        ];
        return response()->json($data);
    }

    public function drawPanier(){

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usr = Auth::user();
        //dd($usr);
        if(!empty($usr)){
            if(Auth::user()->role_id==1){
                return  redirect('admin/dashboard');
            }

            if(Auth::user()->role_id==2){
                return redirect('marchand/dashboard');
            }
            else{
                return view('home');
            }
        }
        return view('home');
    }
}
