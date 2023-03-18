<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ExtendedController;
use App\Models\Depense;
use App\Models\Tdepense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepenseController extends ExtendedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depenses = Depense::all();
        foreach($depenses as $depense){
            $depense->done_at = $depense->created_at;
            $m = Carbon::parse($depense->created_at);
            $depense->save();
        }
        dd($depenses);
        $depenses = Depense::orderBy('created_at','DESC')->paginate(50);
        $types = Tdepense::all();
        return view('/Admin/Depenses/index')->with(compact('types','depenses'));
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
        //dd($request->all());

        $request->session()->flash('success','Ok');
        return back();
    }




}
