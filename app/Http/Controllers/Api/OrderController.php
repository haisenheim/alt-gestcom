<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\Controller;
use App\Http\Resources\CarteResource;
use App\Http\Resources\OrderListResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProvisionLineResource;
use App\Models\Article;
use App\Models\Carte;
use App\Models\ListeCourse;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Provision;
use App\Models\ProvisionLine;
use App\User;
use Illuminate\Support\Str;

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

  public function store(){
      $data = request()->all();
      $lines = $data['lines'];
      $user_id = $data['user_id'];
      $order = Order::create([
          'client_id'=>$user_id,
          'token'=>sha1(time().$user_id),
          'name'=>time()
      ]);


      for($i=0;$i<count($lines);$i++){
          OrderLine::create([
              'article_id'=>$lines[$i]['product_id'],
              'order_id'=>$order->id,
              'quantity'=>$lines[$i]['quantity'],
              'price'=>$lines[$i]['price'],
          ]);
      }
      return response()->json(new OrderResource($order));
  }

  public function save(){
      $data = request()->all();
     //return response()->json($data,401);
      $order = Order::find($data['id']);
      //return response()->json($order,401);
      $user = User::find($data['user_id']);
      $order->user_id = $user->id;
      $order->montant = $data['montant'];
      $order->ticket = $data['ticket'];
      $order->montant_carte = $data['mt_cash'];
      $order->fournisseur_id = $user->fournisseur_id;
      $order->save();
      //return response()->json($order,401);
      $carte = Carte::where('fournisseur_id',$user->fournisseur_id)->where('client_id',$order->client_id)->first();
      $carte->montant = $carte->montant - $data['mt_cash'] + $data['montant'] * $user->fournisseur->percent/100;
      $carte->save();

      $provision = Provision::where('fournisseur_id',$user->fournisseur_id)->where('client_id',$order->client_id)->first();
      $lignes = $order->lignes;
      if($provision){
        $plines = $provision->lignes;
        foreach($lignes as $ligne){
            $exist = false;
            $orderline = null;
            $provline = null;
            foreach($plines as $line){
                if($line->article_id == $ligne->article_id){
                    $orderline=$ligne;
                    $provline = $line;
                    //break;
                }
            }
            if($provline){
                $provline->available = true;
                $provline->quantity = $ligne->quantity;
                $provline->save();
            }
            else{
                $plin = ProvisionLine::create([
                    'available'=>true,
                    'quantity'=>$ligne->quantity,
                    'provision_id'=>$provision->id,
                    'client_id'=>$order->client_id,
                    'fournisseur_id'=>$user->fournisseur_id,
                ]);
            }
        }
      }else{
          $provision = Provision::create([
              'client_id'=>$order->client_id,
              'fournisseur_id'=>$user->fournisseur_id,
              'token'=>sha1(date('Yhmsi').$order->client_id)
          ]);

          foreach($lignes as $ligne){
            ProvisionLine::create([
                'client_id'=>$order->client_id,
                'fournisseur_id'=>$user->fournisseur_id,
                'provision_id'=>$provision->id,
                'article_id'=>$ligne->article_id,
                'quantity'=>$ligne->quantity,
            ]);
          }
      }
      return response()->json(new OrderResource($order));
  }

  public function valider(){
      $data = request()->all();
      $user = User::find($data['user_id']);
      $order = Order::find($data['id']);
      $order->montant = $data['montant'];
      $order->montant_carte = $data['mt_carte'];
      $order->user_id = $data['user_id'];
      $order->fournisseur_id = $user->fournisseur_id;
      $order->save();



      $cart = Carte::where('fournisseur_id',$user->fournisseur_id)->where('client_id',$order->client_id)->first();
      if(!$cart){
          $cart = Carte::create([
              'fournisseur_id'=>$user->fournisseur_id,
              'client_id'=>$order->client_id,
              'token'=>sha1($order->client_id . time() . $user->fournisseur_id)
          ]);
      }
      $cart->montant = $cart->montant + 5*$order->montant/100;
      $cart->montant = $cart->montant - $data['mt_carte'];
      $cart->save();
     /*  $provision = Provision::where('fournisseur_id',$user->fournisseur_id)->where('client_id',$order->client_id)->first();
      $lignes = $order->lignes;
      if($provision){
        $plines = $provision->lignes;
        foreach($lignes as $ligne){
            $exist = false;
            $orderline = null;
            $provline = null;
            foreach($plines as $line){
                if($line->article_id == $ligne->article_id){
                    $orderline=$ligne;
                    $provline = $line;
                    //break;
                }
            }
            if($provline){
                $provline->available = true;
                $provline->quantity = $ligne->quantity;
                $provline->save();
            }
            else{
                $$plin = ProvisionLine::create([
                    'available'=>true,
                    'quantity'=>$ligne->quantity,
                    'provision_id'=>$provision->id,
                    'client_id'=>$order->client_id,
                    'fournisseur_id'=>$user->fournisseur_id,
                ]);
            }
        }
      }else{
          $provision = Provision::create([
              'client_id'=>$order->client_id,
              'fournisseur_id'=>$user->fournisseur_id,
              'token'=>sha1(date('Yhmsi').$order->client_id)
          ]);

          foreach($lignes as $ligne){
            ProvisionLine::create([
                'client_id'=>$order->client_id,
                'fournisseur_id'=>$user->fournisseur_id,
                'provision_id'=>$provision->id,
                'article_id'=>$ligne->article_id,
                'quantity'=>$ligne->quantity,
            ]);
          }
      } */
      return response()->json(new OrderResource($order));
  }

  public function getById($id, $fournisseur_id){
     $order = Order::find($id);
    $cart = Carte::where('fournisseur_id',$fournisseur_id)->where('client_id',$order->client_id)->first();

    if(!$cart){
        $cart = Carte::create([
            'fournisseur_id'=>$fournisseur_id,
            'client_id'=>$order->client_id,
            'token'=>sha1($order->client_id . time() . $fournisseur_id)
        ]);
    }
       return response()->json(['order'=>new OrderListResource($order),'carte'=>new CarteResource($cart)]);
      //return response()->json(new OrderResource(Order::find(rand(1,15))));
  }

  public function getProductBySku($sku){
      $product = Article::where('sku',$sku)->first();

      //$products = Article::all();
      //return response()->json(new ProductResource($products->random()));
      if($product){
          return response()->json(new ProductResource($product));
      }else{
          $code = Str::substr($sku,0,-6);
          $price = Str::substr($sku,-6,5);
          $pps = Article::where('user_id',5)->where('poids_prix',1)->get();
          foreach($pps as $pp){
            if(Str::contains($pp->sku,$code)){
                $pp->price = (int) $price;
                return response()->json(new ProductResource($pp));
            }
          }
        return response()->json(['message'=>"Aucun produit correspondant au code scanne"],486);
      }
  }

  public function getProvisionByClientId($client_id){
    $lignes = ProvisionLine::all()->where('client_id',$client_id);
    $courses = ListeCourse::where('client_id',$client_id)->get();
    return response()->json(ProvisionLineResource::collection($lignes));
  }

}
