<?php

use App\Http\Resources\CarteFrResource;
use App\Models\Carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','namespace'=>'Api'], function () {
    Route::get('test/onesignal','NotificationController@send');
    Route::post('/send-oneSignal-notifications', 'NotificationController@sendNotifications');
    Route::post('/connecter', 'UserController@connecter');
    Route::post('/login', 'UserController@login');
    Route::post('/register', 'UserController@register');
    Route::post('/account/delete', 'UserController@deleteAccount');
	Route::post('/client/create','ClientController@store');//->middleware('auth:api');
	Route::get('/clients','ClientController@index');//->middleware('auth:api');
    //Route::get('/home','HomeController@index');
    Route::get('/home','HomeController@home');
    Route::get('/supermarches','FournisseurController@getSupermarches');
    Route::get('/legumes','FournisseurController@getLegumes');
    Route::get('/boucheries','FournisseurController@getBoucheries');
    Route::get('/chambres','FournisseurController@getChambres');
    Route::get('/fournisseur/{id}','FournisseurController@show');
    Route::get('/category/{id}','FournisseurController@getCategory');
    Route::get('/order/{id}/{fournisseur_id}','OrderController@getById');
    Route::post('/order','OrderController@store');
    Route::post('/valider','OrderController@valider');
    Route::get('/product/{sku}','OrderController@getProductBySku');
    Route::post('/caissier/order','OrderController@save');

    Route::get('/caissier/carte/{token}/{fournisseur_id}', 'CarteController@get');
    Route::post('/caissier/achat', 'CarteController@saveAchat');
    Route::get('/caissier/ba/{token}/{fournisseur_id}', 'CarteController@checkBa');
    Route::get('/promotions/{fournisseur_id}','FournisseurController@getPromotions');


    Route::get('/provisions/{client_id}','OrderController@getProvisionByClientId');

    //Provisons
    Route::get('/order/{id}/{fournisseur_id}','OrderController@getById');
    Route::get('/cashback/{fournisseur_id}/{id}','UserController@getCashBack');
    Route::post('/send/code','UserController@setCode');
    Route::get('/refresh/{id}',function($id){
        return response()->json(new CarteFrResource(Carte::find($id)));
    });
    Route::get('/reset-password/{phone}','UserController@resetPassword');
    Route::post('/reset-password','UserController@savePassword');
    Route::get('/carte/get-ba/{carte_id}','CarteController@getBaByCarte');
});

Route::group(['prefix' => 'v1','namespace'=>'Api\Caissier','middleware'=>'jwt.verify'], function () {
    Route::get('/orders', 'OrderController@index');
    Route::post('/orders', 'OrderController@create');
    Route::get('/order/{token}', 'OrderController@get');

   });

