<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Assure;
use App\Models\Carte;
use App\Models\College;
use App\Models\Courtier;
use App\Models\Entreprise;
use App\Models\Tdepense;
use Illuminate\Http\Request;

class TDepenseController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tdepenses = Tdepense::all();
        return view('/Admin/parametres/tdepenses')->with(compact('tdepenses'));
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
        $data['token'] = sha1(time());
        Entreprise::create($request->all());
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($id)
	{
		$courtier = Courtier::find($id);
		return view('/Admin/Courtiers/show')->with(compact('courtier'));
	}


}
