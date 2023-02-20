<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\Controller;
use App\Http\Resources\BonAchatResource;
use App\Http\Resources\CarteResource;
use App\Models\Achat;
use App\Models\BonAchat;
use App\Models\Carte;
use App\Models\Facture;
use App\Models\Fournisseur;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CarteController extends Controller
{



  public function saveAchat(){
        $rq = request()->all();
      $carte = Carte::find($rq['carte_id']);
      $fournisseur = Fournisseur::find($carte->fournisseur_id);
      $cashback = $rq['montant'] * $fournisseur->percent / 100;
      $facture = Facture::where('mois',date('m'))->where('annee',date('Y'))->first();
      if(!$facture){
        $facture = Facture::create([
            'fournisseur_id'=>$carte->fournisseur_id,
            'name'=> date('mY').$carte->fournisseur_id,
            'mois'=>date('m'),
            'annee'=>date('Y'),
            'token'=>sha1(date('Ymdish').$carte->fournisseur_id),
        ]);
      }


      $achat = Achat::create([
            'carte_id'=>$carte->id,
            'montant'=>$rq['montant'],
            'fournisseur_id'=>$carte->fournisseur_id,
            'cashback'=>$cashback,
            'user_id'=>$rq['user_id'],
            'client_id'=>$carte->client_id,
            'mois'=>date('m'),
            'annee'=>date('Y'),
            'facture_id'=>$facture->id,
            'imageUri'=>$rq['imageUri'],
        ]);
      //return response()->json($order,401);
      $carte->montant = $carte->montant + $cashback;
      $carte->lastly_used_at = new \DateTime();
      $carte->save();
      return response()->json(new CarteResource($carte));
  }

 public function get($cart_token,$fournisseur_id){
    $carte = Carte::where('token',$cart_token)->first();
    if($carte->fournisseur_id != $fournisseur_id){
        return response()->json('Fournisseur invalide',401);
    }
    return response()->json(['carte'=>new CarteResource($carte)]);
 }

 public function getBaByCarte($carte_id){
    $bon = BonAchat::where('carte_id',$carte_id)->whereDate('expired_at','>',Carbon::today())->first();
    //$bon = BonAchat::find(1);
    if($bon){
        return response()->json(new BonAchatResource($bon));
    }else{
        return response()->json(['error'=>'Aucun Bon'],404);
    }
 }

 public function checkBa($_token,$fournisseur_id){
    $ba = BonAchat::where('token',$_token)->first();
    if($ba->fournisseur_id != $fournisseur_id){
        return response()->json('Fournisseur invalide',401);
    }
    if($ba->validated_at){
        return response()->json('Bon d\'achat deja utilise : '.date_format($ba->validated_at,'d/m/Y H:i:s') ,401);
    }
    if($ba->expired){
        return response()->json('ce bon d\'achat a expired le : '.date_format($ba->expired_at,'d/m/Y H:i:s') ,401);
    }
    if(!$ba->active){
        return response()->json('ce bon d\'achat a ete annule' ,401);
    }
    return response()->json('OK');
 }


}
