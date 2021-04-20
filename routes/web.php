<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//CLIENTES
Route::group(['prefix' => 'cliente'], function () {
    Route::get('/', 'ClienteController@show')->middleware('auth')->name('clientes');
    Route::get('/addedit/{id?}', 'ClienteController@addedit')->middleware('auth')->name('addedit-cliente');
    Route::post('/addedit/{id?}', 'ClienteController@store')->middleware('auth')->name('create-update');
    Route::delete('/delete/{id?}', 'ClienteController@destroy')->middleware('auth')->name('delete');
});


//Categoria de produtos
Route::group(['prefix' => 'categoria'], function () {
    Route::get('/', 'CategoriaController@show')->middleware('auth')->name('categoria');
    Route::get('/addedit/{id?}', 'CategoriaController@addedit')->middleware('auth')->name('addedit-categoria');
    Route::post('/addedit/{id?}', 'CategoriaController@store')->middleware('auth')->name('addedit');
    Route::delete('/delete/{id?}', 'CategoriaController@destroy')->middleware('auth')->name('delete');
});


//produto
Route::group(['prefix' => 'produto'], function () {
    Route::get('/', 'ProdutoController@show')->middleware('auth')->name('produtos');
    Route::get('/addedit/{id?}', 'ProdutoController@addedit')->middleware('auth')->name('addedit-produto');
    Route::post('/addedit/{id?}', 'ProdutoController@store')->middleware('auth')->name('addedit');
    Route::delete('/delete/{id?}', 'ProdutoController@destroy')->middleware('auth')->name('deletar-produto');
});

//vendas
Route::group(['prefix' => 'venda'], function () {
    Route::get('/', 'VendaController@index')->middleware('auth')->name('vendas');
    Route::get('/venda', 'VendaController@store')->middleware('auth')->name('nova-venda');
    Route::post('/venda', 'VendaController@get')->middleware('auth')->name('carrega-produto');
});
