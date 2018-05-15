<?php

namespace App\Http\Controllers;

use App\department;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NuevoProductoController extends Controller
{
    
	public function index()
	    {
	        $departamentos = department::all(); 
	        return view('PNuevoProducto.NuevoProducto')->with('departamentos', $departamentos);
	    }


	public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string',
            'precio' => 'required|string',
            'stock' => 'required',
            'descripcion' => 'required',
            'departamento' => 'required',
            'imagen' => 'required|mimes:jpeg,jpg,png|max:2024',
        ];
        
       $this->validate($request, $rules);
         
        $file = $request->file('imagen');
        $nombreimagen = $file->getClientOriginalName();
        Storage::disk('imgproductos')->put($nombreimagen,  \File::get($file));
        
        $producto = new product;
        $producto->{'name-product'} = $request->nombre;
        $producto->{'price-product'} = $request->precio;
        $producto->{'amount-product'} = $request->stock;
        $producto->{'description-product'} = $request->descripcion;
        $producto->{'id-department'} = $request->departamento;
        $producto->{'image-product'} = $nombreimagen;
        $producto->{'low-product'} = 0;
        $producto->{'id-user'} = $request->idusuario;;

        $producto->save();
        return redirect('/principal');
    }


}
