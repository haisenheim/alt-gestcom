<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use App\Models\Client;
use App\User;
use Illuminate\Http\Request;

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
        $users = User::all();
        return view('/Admin/Compte/index')->with(compact('users'));
    }

    public function getDownloads(){
        $users = User::orderBy('created_at','DESC')->get();
        return view('Admin.Users.index')->with(compact('users'));
        //dd($clients);
    }

    public function show($token){
        $user = User::where('token',$token)->first();
        return view('Admin.Users.show')->with(compact('user'));
    }



    public function enable($token){
        $user = User::where('token',$token)->first();
        $user->active = 1;
        $user->save();
        return back();
    }

    public function disable($token){
        $user = User::where('token',$token)->first();
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
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        //$data['role_id'] = 1;
        $data['token'] = sha1(time());
        User::create($data);
        return redirect()->back();
    }



}
