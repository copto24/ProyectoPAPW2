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

Route::get('/Landing', function(){
	return view('Landing');
});

Route::get('/Home', function(){
	return view('Home');
});

Route::get('/Admin', function(){
	return view('Admin');
});

Route::get('/Departamento', function(){
	return view('Departamento');
});

Route::get('/Producto', function(){
	return view('Producto');
});

Route::get('/Ajustes', function(){
	return view('Ajustes');
});

Route::get('/Perfil', function(){
	return view('Perfil');
});

Route::get('/Vender', function(){
	return view('Vender');
});

Route::get('/AdminProducto', function(){
	return view('AdminProducto');
});

Route::get('/Carrito', function(){
	return view('Carrito');
});

Route::get('/MLanding', function(){
	return view('MLanding');
});

Route::get('/MHome', function(){
	return view('MHome');
});

Route::get('/MDepartamento', function(){
	return view('MDepartamento');
});

Route::get('/MProducto', function(){
	return view('MProducto');
});

Route::get('/MPerfil', function(){
	return view('MPerfil');
});

Route::get('/MVender', function(){
	return view('MVender');
});

Route::get('/MAdmin', function(){
	return view('MAdmin');
});

Route::get('/MAdmin2', function(){
	return view('MAdmin2');
});

Route::get('/MCarrito', function(){
	return view('MCarrito');
});

Route::get('/MAdminProducto', function(){
	return view('MAdminProducto');
});

Route::get('/MAjustes', function(){
	return view('MAjustes');
});