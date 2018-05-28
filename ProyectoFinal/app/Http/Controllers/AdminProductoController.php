<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\product;
use App\cart;
use App\department;
use Illuminate\Support\Facades\Storage;

class AdminProductoController extends Controller
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
            $idusuario = Session::get('Usuario')->{'id-user'};
            $productos = product::where('id-user', $idusuario)->get();
            return view('PAdminProducto.AdminProducto')->with('departamentos', $departamentos)->with('productos', $productos);
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
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'store';
    }

    public function modificar(Request $request)
    {
        $rules = [
            'foto' => 'mimes:jpeg,jpg,png|max:2024',
        ];
        
        $messages = [
            'foto.max' => 'La foto no debe pesar mas de 2MB.',
            'foto.mimes' => 'La foto debe ser jpg o png.'
        ];

       $this->validate($request, $rules);

        $id = $request->id;
        $producto = product::find($id);
        if($request->nombre != NULL){
            $producto->{'name-product'} = $request->nombre;
        }
        if($request->precio != NULL){
            $producto->{'price-product'} = $request->precio;
        }
        if($request->stock != NULL){
            $producto->{'amount-product'} = $request->stock;
        }
        if($request->descripcion != NULL){
            $producto->{'description-product'} = $request->descripcion;
        }
        $producto->{'id-department'} = $request->departamento;
        $file = $request->file('foto');
        if($file != NULL){
            $path = $producto->{'image-product'};
            Storage::disk('imgproductos')->delete($path);

            $nombreimagen = $file->getClientOriginalName();
            Storage::disk('imgproductos')->put($nombreimagen,  \File::get($file));
            $producto->{'image-product'} = $nombreimagen;
        }
        $producto->save();
        return redirect('/adminproducto')->with('message','2');
    }

    public function eliminar(Request $request)
    {
        $id = $request->id;

        $carrito = cart::where('carts.id-product', $id)->get();
        for ($i=0; $i < $carrito->count(); $i++) { 
            $idcart =  $carrito[$i]->{'id-cart'};
            $carritoex = cart::find($idcart);
            $carritoex->delete();
        }

        $producto = product::find($id);
        $producto->delete();


        return redirect('/adminproducto')->with('message','3');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'Show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'Edtar';
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
        return 'modificar';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return 'OH';
    }
}
