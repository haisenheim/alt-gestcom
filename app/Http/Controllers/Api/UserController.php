<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarteFrResource;
use App\Http\Resources\CarteResource;
use App\Http\Resources\FournisseurListResource;
use App\Http\Resources\FournisseurResource;
use App\Http\Resources\UserResource;
use App\Models\Carte;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Param;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client as TwilioClient;


class UserController extends Controller
{
	/*
	 *  Login action
	 */


	//Please add this method
	public function login() {
		// get email and password from request
		$credentials = request(['phone', 'password']);
        $fournisseur_id = request('fournisseur_id');
		// try to auth and get the token using api authentication
		if (!$token = auth('api')->attempt($credentials)) {
			// if the credentials are wrong we send an unauthorized error in json format
			return response()->json(['error' => 'Unauthorized'], 401);
		}


        Client::updateOrCreate(['id'=>auth('api')->user()->id],['last_connection'=>new \DateTime()]);
		$user = auth('api')->user();
        $param = Param::find(1);
        $cart = Carte::where('fournisseur_id',$fournisseur_id)->where('client_id',$user->id)->first();
        if(!$cart){
            $cart = Carte::create([
                'fournisseur_id'=>$fournisseur_id,
                'client_id'=>$user->id,
                'mois'=>date('m'),
                'annee'=>date('Y'),
                'semaine'=>date('W'),
                'token'=>sha1($user->id . time() . $fournisseur_id)
            ]);
        }
        $fournisseur = new FournisseurResource(Fournisseur::find($fournisseur_id));
        if ($user->deleted_at) {
			// if the credentials are wrong we send an unauthorized error in json format
			return response()->json(['error' => 'Compte inexistant'], 403);
		}

        return response()->json([
			'token' => $token,
			'type' => 'bearer', // you can ommit this
			'expires' => auth('api')->factory()->getTTL() * 60, // time to expiration
			'user'=>auth('api')->user(),
            'carte'=> new CarteResource($cart),
            'link'=>$param?$param->link:'Aucun lien',
            'link_ios'=>$param?$param->link_ios:'Aucun lien',
            'fournisseur'=>$fournisseur

		]);
	}

    public function setCode(){
        $code = request('code');
        $user_id = request('user_id');

        $parrain = Client::where('code',$code)->first();
        if($parrain){
            Client::updateOrCreate(['id'=>$user_id],['parrain_id'=>$parrain->id,'mois'=>date('m'),'semaine'=>date('W'),'annee'=>date('Y')]);
            return response()->json('ok');
        }else{
            return response()->json(['error'=>'Parrain inexistant'],401);
        }
    }

    public function connecter(){

        $password = request('password');
        $phone = request('phone');
        //$credentials = request(['phone', 'password']);

        $user = User::where('phone',$phone)->first();
        //return response()->json($user);

        if($user){
           if(Hash::check($password, $user->password)){
                if($user->active && $user->role_id == 3){
                    return response()->json([
                        'token' => $user->token,
                        'user'=> new UserResource($user),
                        'fournisseur'=>new FournisseurListResource($user->fournisseur),
                    ]);
                }else{
                    return response()->json(['error'=>'Compte utilisateur invalide'],401);
                }
           }else{
               return response()->json(['error'=>'Mot de passe invalide'],401);
           }
        }else{
            return response()->json(['error'=>'Utilisateur invalide'],401);
        }
    }

	public function test(Request $request){
		$headers = $request->headers;
		dd($headers);
	}

    public function getCashBack(Request $request, $fournisseur_id ,$id){
        $user = Client::find($id);
        $cart = Carte::where('fournisseur_id',$fournisseur_id)->where('client_id',$user->id)->first();
        if($cart){
            return response()->json(new CarteResource($cart));
        }
        else{
            return response()->json("Aucune carte pour le moment",401);
        }
    }

    public function deleteAccount(){
        $client = Client::where('token',request()->token)->first();
        $client->deleted_at = new \DateTime();
        $client->deleted_month = date('m');
        $client->deleted_year = date('Y');
        $client->phone = '_'.$client->phone;
        $client->save();
        return response()->json('ok');
    }


    public function resetPassword($phone){
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $code = rand(1000,9999);
        $client = new TwilioClient($account_sid, $auth_token);
        $client->messages->create('+242'.$phone, ['from' => $twilio_number, 'body' => 'Votre  code est : '.$code]);
        return response()->json(['code'=>$code],200);
    }

    public function savePassword(){
        //$client = Client::where('phone',request()->phone)->first();
        $client = Client::find(request('user_id'));
        //return request()->all;
        $client->password = bcrypt(request()->password);
        $client->save();
        $carte = Carte::where('client_id',$client->id)->where('fournisseur_id',request()->fournisseur_id)->first();
        //return response()->json(['carte'=> new CarteFrResource($carte),],200);
        $token = auth('api')->attempt(['phone'=>$client->phone,'password'=>request()->password]);
        $fournisseur = new FournisseurResource(Fournisseur::find(request()->fournisseur_id));
        $param = Param::find(1);
        return response()->json([
            'token'=>$token,
			'type' => 'bearer', // you can ommit this
			'expires' => auth('api')->factory()->getTTL() * 60, // time to expiration
			'user'=>auth('api')->user(),
            'carte'=> new CarteResource($carte),
            'fournisseur'=>$fournisseur,
            'link'=>$param?$param->link:'Aucun lien',
            'link_ios'=>$param?$param->link_ios:'Aucun lien',

		]);
    }


	/**
	 * Register api.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request)
	{
 		 $validator = Validator::make($request->all(), [
			'last_name' => 'required',
			'phone' => 'required|unique:clients',
		]);
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'message' => $validator->errors(),
			], 401);
		}
        $exist = Client::where('phone',$request->phone)->first();
        if($exist){
            return response()->json([
                'success'=>false,
                'message'=>'Ce compte existe deja',
            ],410);
        }
		$input = $request->except('fournisseur_id');
		$input['password'] = bcrypt(request('password'));
        $input['token'] = sha1(date('Yhimds').rand(0,9999));
        $input['registred_by_app_id'] = $request->fournisseur_id;

       // $credentials = request(['phone', 'password']);
		$user = Client::create($input);
		//$success['token'] = $user->createToken('appToken')->accessToken;
        $token = auth('api')->attempt(['phone'=>request('phone'),'password'=>'1234']);
        $fournisseur_id = request('fournisseur_id');
        $fournisseur = new FournisseurResource(Fournisseur::find($fournisseur_id));
        $cart = Carte::create([
            'fournisseur_id'=>$fournisseur_id,
            'client_id'=>$user->id,
            'mois'=>date('m'),
            'annee'=>date('Y'),
            'semaine'=>date('W'),
            'token'=>sha1($user->id . time() . $fournisseur_id)
        ]);
        $user->code = str_pad($user->id,6,"0",STR_PAD_LEFT);
        $user->save();
        $param = Param::find(1);
        return response()->json([
			'success' => true,
			'token' => $token,
			'user' => $user,
            'carte'=> new CarteResource($cart),
            'link'=>$param?$param->link:'Aucun lien',
            'link_ios'=>$param?$param->link_ios:'Aucun lien',
            'fournisseur'=>$fournisseur,
		]);
	}
}
