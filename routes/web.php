<?php

use App\Models\Achat;
use App\Models\Article;
use App\Models\Cashback;
use App\Models\Facture;
use App\Models\Fournisseur;
use App\Models\Moi;
use Illuminate\Support\Facades\Route;
use BeyondCode\Mailbox\InboundEmail;
use BeyondCode\Mailbox\Facades\Mailbox;
use App\Models\MailboxInboundEmail;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('test/email',function(){
    $data = ['message' => 'Premier message de Nyota'];
    Mail::to('clementessomba@gmail.com')->send(new TestEmail($data));

});

Route::get('/', function () {
	return view('auth/login');
});

Route::get('/policy',function(){
    return view('policy');
});

Route::get('/ip', function () {
	dd(request());
});



Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('kpi/fournisseur/ventes','KpiController@getFournisseurVentes');
Route::get('kpi/fournisseur/cartes','KpiController@getFournisseurCartes');
Route::get('kpi/fournisseur/intervalles','KpiController@getFournisseurIntervalles');
Route::get('json/type/prestataires/{id}','DataController@getPrestatairesByType');
Route::get('json/entreprise/assures/{id}','DataController@getByEntreprise');



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){
        Route::get('/dashboard','DashboardController');
        Route::resource('/clients', 'ClientController');

        Route::resource('/paiements', 'PaiementController');
        Route::resource('/depenses', 'DepenseController');
        Route::resource('/commerciales', 'CommercialeController');
        Route::post('/commerciale/commission','CommercialeController@addCommission');
        Route::post('/commerciale/payer','CommercialeController@payer');
        Route::resource('/parametres/tdepenses', 'TDepenseController');

        Route::resource('/parametres/articles', 'ArticleController');
        Route::resource('/cartes', 'CarteController');

        Route::resource('/users', 'UserController');
        Route::get('compte/enable/{token}','UserController@enable');
        Route::get('compte/disable/{token}','UserController@disable');
        Route::resource('/factures', 'FactureController');
        Route::get('/factures/edit/{id}', 'FactureController@edit');
        Route::get('/facture/tva/enable/{id}', 'FactureController@enableTva');
        Route::get('/facture/tva/disable/{id}', 'FactureController@disableTva');
        Route::get('/facture/print/{id}', 'FactureController@imprimer');
        Route::post('/factures/save', 'FactureController@save');
        Route::post('/facture/payer','FactureController@addPaiement');
    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*

- Les forfaits sante
- Le forfait de la carte peut etre subdivise en (Labo, Clinique, Pharmacie) ou pas (pour les assures police - plafond de carte)
- Les prix des prestations sont
*/
