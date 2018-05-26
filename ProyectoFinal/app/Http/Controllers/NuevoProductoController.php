<?php

namespace App\Http\Controllers;

use App\department;
use App\product;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NuevoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('Usuario')){
           $departamentos = department::all(); 
           return view('PNuevoProducto.NuevoProducto')->with('departamentos', $departamentos);
        }else{
            return redirect('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'departamento' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png|max:2024',
        ];
        
        $messages = [
            'foto.max' => 'La foto no debe pesar mas de 2MB.',
            'foto.mimes' => 'La foto debe ser jpg o png.'
        ];

       $this->validate($request, $rules);
         
        $file = $request->file('foto');
        $nombreimagen = $file->getClientOriginalName();
        Storage::disk('imgproductos')->put($nombreimagen,  \File::get($file));
        
        $producto = new product;
        $producto->{'name-product'} = $request->nombre;
        $producto->{'price-product'} = $request->precio;
        $producto->{'amount-product'} = $request->stock;
        $producto->{'description-product'} = $request->descripcion;
        $producto->{'id-department'} = $request->departamento;
        $producto->{'image-product'} = $nombreimagen;
        $producto->{'id-user'} = Session::get('Usuario')->{'id-user'};

        $producto->save();
        return redirect('/adminproducto')->with('message','1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
