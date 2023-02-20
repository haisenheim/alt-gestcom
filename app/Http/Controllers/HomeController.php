<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
                return redirect('prestataire/dashboard');
            }

            if(Auth::user()->role_id==3){
                return redirect('pharmacie/dashboard');
            }
            if(Auth::user()->role_id==4){
                return redirect('laboratoire/dashboard');
            }
            if(Auth::user()->role_id==5){
                return redirect('medecin/dashboard');
            }
            if(Auth::user()->role_id==6){
                return redirect('vendeur/dashboard');
            }
            if(Auth::user()->role_id==7){
                return redirect('laborantin/dashboard');
            }
            if(Auth::user()->role_id==8){
                return redirect('courtier/dashboard');
            }
            else{
                return view('home');
            }
        }
        return view('home');
    }
}
