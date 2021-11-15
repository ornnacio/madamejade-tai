<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	if (Session::has('user_id')){
		return redirect('/inicial');
	}else{
		return redirect('/login');
	}
});

//---login

Route::get('/cadastro', 'App\Http\Controllers\LoginController@cadastro');
Route::post('/criar', 'App\Http\Controllers\LoginController@store');
Route::get('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/login', 'App\Http\Controllers\LoginController@verificar');
Route::get('/logout', 'App\Http\Controllers\LoginController@sair');
Route::get('/inicial', 'App\Http\Controllers\LoginController@inicial');

//---produtos

Route::get('/produtos', 'App\Http\Controllers\ProdutosController@show');
Route::post('/produtos', 'App\Http\Controllers\ProdutosController@search')->name('buscar_produto');
Route::get('/adicionar_produto', 'App\Http\Controllers\ProdutosController@adicionar');
Route::post('/adicionar_produto', 'App\Http\Controllers\ProdutosController@store')->name('salvar_produto');
Route::get('/editar_produto/{id}', 'App\Http\Controllers\ProdutosController@edit');
Route::post('/editar_produto/{id}', 'App\Http\Controllers\ProdutosController@update')->name('editar_produto');
Route::get('/excluir_produto/{id}', 'App\Http\Controllers\ProdutosController@destroy')->name('deletar_produto');
Route::get('/relatorio_produto', 'App\Http\Controllers\ProdutosController@gerar')->name('relatorio_produto');

//---pedidos

Route::get('/pedidos', 'App\Http\Controllers\PedidosController@show');
Route::post('/pedidos', 'App\Http\Controllers\PedidosController@search')->name('buscar_pedido');
Route::get('/adicionar_pedido', 'App\Http\Controllers\PedidosController@adicionar');
Route::post('/adicionar_pedido', 'App\Http\Controllers\PedidosController@store')->name('salvar_pedido');
Route::get('/editar_pedido/{id}', 'App\Http\Controllers\PedidosController@edit');
Route::post('/editar_pedido/{id}', 'App\Http\Controllers\PedidosController@update')->name('editar_pedido');
Route::get('/excluir_pedido/{id}', 'App\Http\Controllers\PedidosController@destroy')->name('deletar_pedido');
Route::get('/relatorio_pedido', 'App\Http\Controllers\PedidosController@gerar')->name('relatorio_pedido');
Route::get('/email_pedido', 'App\Http\Controllers\PedidosController@email')->name('email_pedido');

//---mudas

Route::get('/mudas', 'App\Http\Controllers\MudasController@show');
Route::post('/mudas', 'App\Http\Controllers\MudasController@search')->name('buscar_muda');
Route::get('/adicionar_muda', 'App\Http\Controllers\MudasController@adicionar');
Route::post('/adicionar_muda', 'App\Http\Controllers\MudasController@store')->name('salvar_muda');
Route::get('/editar_muda/{id}', 'App\Http\Controllers\MudasController@edit');
Route::post('/editar_muda/{id}', 'App\Http\Controllers\MudasController@update')->name('editar_muda');
Route::get('/excluir_muda/{id}', 'App\Http\Controllers\MudasController@destroy')->name('deletar_muda');
