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

use Illuminate\Support\Facades\Auth;

Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_criar_serie')->middleware('Autenticador');
Route::post('/series/criar', 'SeriesController@store')->middleware('Autenticador');
Route::delete('/series/{id}', 'SeriesController@destroy')->middleware('Autenticador');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')->middleware('Autenticador');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('Autenticador');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
Route::get('/sair', function (){
    Auth::logout();
    return redirect('/entrar');
});

//auth criado pelo laravel atraves do comando php artisan make:auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

