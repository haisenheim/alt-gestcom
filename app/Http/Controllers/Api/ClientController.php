<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Pay;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //
	private function _getUser(){
		$user = User::where('token',request('token'))->first();
		return $user;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $user = $this->_getUser();
        $users = User::all()->where('role_id',3)->where('creator_id',$user->id);
        return response()->json(['users'=>$users->values()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //  dd($request['imageUri']);
	    $auth = $this->_getUser();
		$data = ['first_name'=>$request['first_name'],'last_name'=>$request['last_name'],'phone'=>$request['phone'],'address'=>$request['address'],'email'=>$request['email'],
			'pay_id'=>$auth->pay_id,'agence_id'=>$auth->agence_id,'role_id'=>3,'password'=>Hash::make($request['first_name']),'moi_id'=>date('m'),'annee'=>date('Y'),'active'=>1,
			'token'=>sha1($auth->id . date('Yhmdhis')),'creator_id'=>$auth->id
		];
        /*$user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->email = $request['email'];
        $user->pay_id = $auth->pay_id;
	    $user->password= Hash::make(($request['password']));
	    $user->role_id =3;
	    $user->agence_id = $auth->agence_id;
	    $user->moi_id=date('m');
	    $user->annee=date('Y');
	    $user->male = $request['male']=='on'?1:0;
	    $user->active = 1;
	    $user->token = sha1($auth->id . date('Yhmdhis'));
	    $user->creator_id = $auth->id;*/

        //$user->save();
	    $user = User::create($data);
	    if($user){
		    return response()->json([
			    'success' => true,
			    'user' => $user,
			    'message'=>'Le client a été ajouté avec succès !!!'
		    ]);
	    }else{
		    return response()->json([
			    'success' => false,
			    'message'=>'Echec lors de l\'enregistrement du client !!!'

		    ]);
	    }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
