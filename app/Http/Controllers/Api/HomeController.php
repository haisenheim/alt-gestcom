<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\Controller;
use App\Http\Resources\FournisseurListResource;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\ListeListResource;
use App\Http\Resources\ProvisionLineResource;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\ListeCourse;
use App\Models\Order;
use App\Models\ProvisionLine;
use App\User;

class HomeController extends Controller
{

  protected $_user;

  public function __construct()
  {
      $this->_user = User::where('token',request('user_token'))->first();
  }

  public function index(){
      $token = request()->user_token;
      $client = Client::where('token',$token)->first();
      //dd($token);
      $listes = $client?ListeListResource::collection(ListeCourse::where('client_id',$client->id)->get()):[];
      $provisions = $client?ProvisionLineResource::collection(ProvisionLine::all()->where('client_id',$client->id)):[];
	  $supermaches = FournisseurListResource::collection(Fournisseur::where('type_id',1)->get());
      $legumes = FournisseurListResource::collection(Fournisseur::where('type_id',2)->get());
      $boucheries = FournisseurListResource::collection(Fournisseur::where('type_id',3)->get());
      $chambres = FournisseurListResource::collection(Fournisseur::where('type_id',4)->get());
	  return response()->json(
          [
            'supermarches'=>$supermaches,
            'legumes'=>$legumes,
            'boucheries'=>$boucheries,
            'chambres'=>$chambres,
            'listes'=>$listes,
            'provisions'=>$provisions,
        ]);
  }

  public function home(){
      $fournisseur = new FournisseurResource(Fournisseur::find(5));
      return response()->json($fournisseur);
  }



}
