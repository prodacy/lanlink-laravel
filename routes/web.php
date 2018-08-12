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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();


Route::group(['namespace' => 'Painel','prefix'=>'painel'], function() {

	// Route::group(['prefix'=>'funcionarios'], function() {
	// 	Route::resource('/', 'FuncionarioController');
	// });

	Route::resource('/departamentos', 'DepartamentoController')->middleware('auth');
	Route::resource('/funcionarios', 'FuncionarioController')->middleware('auth');
	Route::resource('/movimentacoes', 'MovimentacaoController')->middleware('auth');

	Route::get('/', 'PainelController@index');
});