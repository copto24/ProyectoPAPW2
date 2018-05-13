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
use App\country;

Route::get('/Landing', function(){
	$paises = country::all();
	$paises = $paises->pluck('name-country', 'id-country');
	//dd($paises);
	return view('PLanding.Landing', compact('paises'));
});

Route::get('/Home', function(){
	return view('PHome.Home');
});

Route::get('/Admin', function(){
	return view('PAdmin.Admin1');
});

Route::get('/Admin2', function(){
	return view('PAdmin.Admin2');
});

Route::get('/Departamento', function(){
	return view('PDepartamento.Departamento');
});

Route::get('/Producto', function(){
	return view('PProducto.Producto');
});

Route::get('/Ajustes', function(){
	return view('PAjustes.Ajustes');
});

Route::get('/Perfil', function(){
	return view('PPerfil.Perfil');
});

Route::get('/Vender', function(){
	return view('PVender.Vender');
});

Route::get('/AdminProducto', function(){
	return view('PAdminProducto.AdminProducto');
});

Route::get('/Carrito', function(){
	return view('PCarrito.Carrito');
});

Route::get('/Historial', function(){
	return view('PHistorial.Historial');
});