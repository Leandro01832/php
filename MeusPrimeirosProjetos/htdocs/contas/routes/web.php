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

Route::get('/contas', "App\Http\Controllers\ContasPagarController@listar");
Route::get('/contas/cadastrar', "App\Http\Controllers\ContasPagarController@cadastro",
 function(){})->middleware("auth");
Route::post('/contas/salvar', "App\Http\Controllers\ContasPagarController@salvar",
 function(){})->middleware("auth");
Route::get('/contas/editar/{id}', "App\Http\Controllers\ContasPagarController@editar");
Route::post('/contas/atualizar/{id}', "App\Http\Controllers\ContasPagarController@atualizar");
Route::get('/contas/apagar/{id}', "App\Http\Controllers\ContasPagarController@apagar");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
