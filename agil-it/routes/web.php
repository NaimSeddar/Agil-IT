<?php

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

Auth::routes();

Route::get('/formulaire', 'FormulaireController@index')->name('formulaire');
Route::post('/send', 'FormulaireController@send')->name('send');

Route::get('/entreprise/create','EntrepriseController@createEntreprise')->name('formulaireEntreprise');
Route::post('/entreprise/enregistrer','EntrepriseController@enregistrerEntreprise')->name('enregistrerEntreprise');
Route::get('/', 'AccueilController@index')->name('welcome');



Route::get('/home', 'HomeController@index')->name('home');
