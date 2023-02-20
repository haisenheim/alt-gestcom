<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FournisseurListResource;
use App\Http\Resources\FournisseurResource;
use App\Models\Projet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\ProjetResource;
use App\Http\Resources\PromotionResource;
use App\Models\Category;
use App\Models\Fournisseur;
use App\Models\Promotion;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSupermarches()
    {
	    return  FournisseurListResource::collection(Fournisseur::where('type_id',1)->get());
    }

    public function getLegumes()
    {
	    return  response()->json(FournisseurListResource::collection(Fournisseur::where('type_id',2)->get()));
    }

    public function getBoucheries()
    {
	    return  response()->json(FournisseurListResource::collection(Fournisseur::where('type_id',3)->get()));
    }

    public function getChambres()
    {
	    return  response()->json(FournisseurListResource::collection(Fournisseur::where('type_id',4)->get()));
    }


    public function getPromotions($id){
        $promotions = Promotion::where('fournisseur_id',$id)->get();
        return response()->json(PromotionResource::collection($promotions));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(new FournisseurResource(Fournisseur::find($id)));
    }

    public function getCategory($id)
    {
        return response()->json(new CategoryResource(Category::find($id)));
    }


}
