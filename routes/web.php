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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//CLIENTES
Route::get('/cliente', 'ClienteController@index')->middleware('auth')->name('clientes');
Route::get('/adicionar-cliente', 'ClienteController@index_cadastro')->middleware('auth')->name('novo-cliente');
Route::post('/adicionar-cliente', 'ClienteController@novo_cliente')->middleware('auth')->name('adicionar-cliente');

//Categoria de produtos
Route::get('/categoria-produto', 'CategoryProdutoController@index')->middleware('auth')->name('categoria-produto');
Route::get('/nova-categoria-produto', 'CategoryProdutoController@indexAddCategory')->middleware('auth')->name('nova-categoria');
Route::post('/nova-categoria-produto', 'CategoryProdutoController@createCategory')->middleware('auth')->name('add-nova-categoria');

//produto
Route::get('/produto', 'ProdutoController@index')->middleware('auth')->name('produtos');
Route::get('/adicionar-produto', 'ProdutoController@indexNewProduto')->middleware('auth')->name('novo-produto');

//vendas
Route::get('/vendas', 'VendaController@index')->middleware('auth')->name('vendas');
Route::get('/nova-venda', 'VendaController@indexNewVenda')->middleware('auth')->name('nova-venda');
