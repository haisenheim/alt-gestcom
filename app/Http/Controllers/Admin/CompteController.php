<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use App\Models\Client;
use App\User;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('/Admin/Compte/index')->with(compact('users'));
    }

    public function getDownloads(){
        $clients = Client::orderBy('created_at','DESC')->get();
        return view('Admin.Clients.telechargements')->with(compact('clients'));
        //dd($clients);
    }

    public function show($token){
        $client = Client::where('token',$token)->first();
        return view('Admin.Clients.show')->with(compact('client'));
    }

    public function resetPassword($token){
        $client = Client::where('token',$token)->first();
        $client->password = bcrypt('12345');
        $client->save();
        $this->flash('warning','Le nouveau mot de passe de compte est 12345');
        return redirect()->back();
    }

    public function getCard($token){
        $carte = Carte::where('token',$token)->first();
        return view('Admin.Clients.carte')->with(compact('carte'));
    }

    public function enable($id){
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return back();
    }

    public function disable($id){
        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return back();
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
    }



}
