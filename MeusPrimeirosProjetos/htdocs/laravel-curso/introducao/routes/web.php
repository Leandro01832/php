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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/teste', function () {
//    return "<b>RL SYSTEM<b/>";
//});

Route::get('/clientes/listar', 'App\Http\Controllers\ClienteController@listar');
Route::get('/clientes/lista', 'App\Http\Controllers\ClienteController@listar');
Route::get('/clientes/registros', 'App\Http\Controllers\ClienteController@listar');
Route::get('/clientes/listar2', 'App\Http\Controllers\ClienteController@listar2');
Route::get('/clientes/editar/{id}', 'App\Http\Controllers\ClienteController@editar')-> where('id', '[0-9]');
Route::get('/clientes/excluir/{id}', 'App\Http\Controllers\ClienteController@excluir')-> where('id', '[0-9]');
Route::get('/clientes/detalhes/{id}', 'App\Http\Controllers\ClienteController@detalhes')-> where('id', '[0-9]');
Route::get('/clientes/novo', 'App\Http\Controllers\ClienteController@novo');
