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

Route::auth();

Route::get('/formulaire', 'FormulaireController@index')->name('formulaire');

Route::get('/', 'AccueilController@index')->name('welcome');

Route::post('/send', 'FormulaireController@send')->name('send');

Route::get('/home', 'HomeController@index')->name('home');