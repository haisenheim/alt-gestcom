<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd(request());
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

	public function profil(Request $request){
		$user = User::where('token',$request->token)->first();

		if($request->password != $request->cpassword){
			$request->session()->flash('danger','La confirmation du mot de passe n\'est pas correcte !!!');
			return back();
		}

		$data = $request->except('_csrf','imageUri','cpassword');
		if($request->password){
			$data['password'] = Hash::make($request->password);
		}else{
			$data['password'] = $user->password;
		}

		if($request->imageUri){
			$file = $request->imageUri;
			$ext = $file->getClientOriginalExtension();
			$arr_ext = array('jpg','png','jpeg','gif');
			if(in_array($ext,$arr_ext)) {
				if (!file_exists(public_path('img') . '/users')) {
					mkdir(public_path('img') . '/users');
				}
				$token = sha1(Auth::user()->id. date('ydmhis'));
				if($user->imageUri){
					if(file_exists(public_path('img') . $user->imageUri)){
						unlink(public_path('img') . $user->imageUri);
					}
				}
				if (file_exists(public_path('img') . '/users/' . $token . '.' . $ext)) {
					unlink(public_path('img') . '/users/' . $token . '.' . $ext);
				}
				$name = $token . '.' . $ext;
				$file->move(public_path('img/users'), $name);
				$data['imageUri'] = 'users/' . $name;
			}
		}

		$user = User::updateOrCreate(['token'=>$user->token],$data);

		return redirect('logout');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
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
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request){
        dd($request->isMethod('post'));
    }
}
