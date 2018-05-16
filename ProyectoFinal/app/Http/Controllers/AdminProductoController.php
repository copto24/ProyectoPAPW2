<?php

namespace App\Http\Controllers;

use Session;
use App\product;
use App\department;
use Illuminate\Http\Request;

class AdminProductoController extends Controller
{
    public function index()
    {
        $departamentos = department::all(); 
        $idusuario = Session::get('Usuario')->{'id-user'};
        $productos = product::select()->where([
            ['id-user', '=', $idusuario]
        ])->get();
        //dd($productos);
	    return view('PAdminProducto.AdminProducto')->with('departamentos', $departamentos)->with('productos', $productos);
    }
}
