<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Commerciale;
use App\Models\Commission;
use App\Models\Facture;
use App\Models\Pcommission;
use Illuminate\Http\Request;

class CommercialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Commerciale::all();
        $items = Client::all();
        return view('/Admin/Commerciales/index')->with(compact('clients','items'));
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
        Commerciale::create($request->all());
        return back();
    }

    public function addCommission(Request $request){
        $data = $request->all();
        $data['moi_id'] = date('m');
        $data['annee'] = date('Y');
        Commission::create($data);
        return back();
    }

    public function payer(Request $request){
        $data = $request->all();
        $commission = Commission::find($request->commission_id);
        $data['moi_id'] = date('m');
        $data['annee'] = date('Y');
        $data['facture_id'] = $commission->facture_id;
        Pcommission::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
	public function show($token)
	{
		$item = Commerciale::find($token);
        $factures = Facture::where('client_id',$item->client_id)->get();
		return view('/Admin/Commerciales/show')->with(compact('item','factures'));
	}


}
