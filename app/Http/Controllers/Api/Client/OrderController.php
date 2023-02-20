<?php

namespace App\Http\Controllers\Api\Client;
use App\Http\Controllers\Api\Controller;
use App\Models\Order;
use App\User;


class OrderController extends Controller
{

  protected $_user;
  public function __construct()
  {
      $this->_user = User::where('token',request('token'))->first();
  }

  public function index(){
	  $orders = Order::all()->where('user_id',auth('api')->user()->id)->where('fournisseur_id',$this->_user->fournisseur_id);
	  return response()->json($orders);
  }


  public function get($token){
    $order = Order::where('token',$token)->first();
    $panier['order'] = ['name'=>$order->name];
    foreach($order->lignes as $ligne){
        $cart['article'] = $ligne->article?$ligne->article->name:'-';
        $cart['quantity'] = $ligne->quantity;
        $cart['pu'] = $ligne->price;
        $panier['lignes'][] = $cart;
    }

    return response()->json($panier);
  }


}
