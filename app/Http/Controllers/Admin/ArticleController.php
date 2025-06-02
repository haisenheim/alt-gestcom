<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Assure;
use App\Models\Carte;
use App\Models\Category;
use App\Models\Exercice;
use App\Models\Lot;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        $categories = Category::all();
        return view('/Admin/Articles/index')->with(compact('articles','categories'));
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
        Article::create($request->all());
        return back();
    }

    public function actualiser(Request $request){
       // dd($request->all());
       $article = Article::find($request->article_id);
       $article->quantite = $request->quantite;
       $article->name = $request->name;
       $article->save();
       // Article::updateOrCreate(['id'=>$request->article_Id],['quantite'=>$request->quantite]);
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
		//$projet = Creance::where('token',$token)->first();


		return view('/Consultant/Creances/show')->with(compact('projet'));
	}


}
