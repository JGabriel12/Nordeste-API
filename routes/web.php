<?php

use Illuminate\Support\Facades\Route;

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

// Cadastrar

Route::get('/cadastrarEstadia', 'App\Http\Controllers\EstadiaController@store');

Route::get('/cadastrarMesa', 'App\Http\Controllers\MesaController@store');

Route::get('/cadastrarPedido', 'App\Http\Controllers\PedidoController@store');

Route::get('/cadastrarPrato', 'App\Http\Controllers\PratoController@store');

// Atualizar

Route::get('/AtualizarPedido', 'App\Http\Controllers\PedidoController@update');

Route::get('/AtualizarPrato', 'App\Http\Controllers\PratoController@update');

Route::get('/AtualizarMesa', 'App\Http\Controllers\MesaController@update');

Route::get('/AtualizarEstadia', 'App\Http\Controllers\EstadiaController@update');


// Excluir

Route::get('/ExcluirPrato', 'App\Http\Controllers\PratoController@updateStatus');

Route::get('/ExcluirMesa', 'App\Http\Controllers\MesaController@updateStatus');

Route::get('/ExcluirEstadia', 'App\Http\Controllers\EstadiaController@updateStatus');

Route::get('/ShowMesa', 'App\Http\Controllers\MesaController@show');


/* Route::get('/', function () {
    return view('welcome');
}); */
