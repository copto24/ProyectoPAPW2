<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\product;
use App\User;
use App\comment;
use App\reason;
use App\score;
use App\bloqued;

use Session;

class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return '1';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '2';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return '3';
        
    }

    public function buscarproductos(Request $request)
    {
        $iddepa = $request->depa;
        $busqueda = 0;
        $texto = $request->tex;
        $PrecioI = 0;
        $PrecioF = 0;
        $Valor = 0;
        if(Session::has('Usuario')){
            $departamentos = department::all(); 
            if($iddepa == 0){
                $nombredepa = 'Todos los productos';
                $productos = product::join('users', 'products.id-user','users.id-user')
                            ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                            ->whereNull('bloqueds.id-bloqued')
                            ->where('products.name-product', 'like', '%'.$texto.'%')
                            ->paginate(8);
                return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
            }else{
                $busqueda = 1;
                $nombredepa= department::find($iddepa);
                $productos = product::join('users', 'products.id-user','users.id-user')
                            ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                            ->whereNull('bloqueds.id-bloqued')
                            ->where('products.id-department',$iddepa)
                            ->where('products.name-product', 'like', '%'.$texto.'%')
                            ->paginate(8);
                return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
            }


            /*return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                    ]);*/
        }else{
            return redirect('/');
        }
    }

    public function buscarfiltros(Request $request)
    {
            $iddepa = $request->depa;
            $busqueda = 0;
            $texto = $request->tex;
            $PrecioI = $request->PrecioI;
            $PrecioF = $request->PrecioF;
            $Valor = $request->valor;
            $departamentos = department::all(); 
            if($iddepa == 0){
                $nombredepa = 'Todos los productos';
                if(($PrecioI != 0 || $PrecioF != 0 )&& $Valor != 0){
                    $valoruno = $Valor - 0.5;
                    $valordos = $Valor + 0.5;
                     $productos = product::join('users', 'products.id-user','users.id-user')
                                        ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                        ->join('scores', 'products.id-product','scores.id-product')
                                        ->select('products.id-product','products.name-product','products.price-product','products.image-product')
                                        ->whereNull('bloqueds.id-bloqued')
                                        ->whereBetween('products.price-product', [$PrecioI, $PrecioF])
                                        ->where('products.name-product', 'like', '%'.$texto.'%')
                                        ->groupBy('products.id-product')
                                        ->havingRaw("avg(`scores`.`quality-score`) >= $valoruno")
                                        ->havingRaw("avg(`scores`.`quality-score`) < $valordos")
                                        ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }else if($PrecioI != 0 || $PrecioF != 0 && $Valor == 0){
                    $productos = product::join('users', 'products.id-user','users.id-user')
                                        ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                        ->whereNull('bloqueds.id-bloqued')
                                        ->whereBetween('products.price-product', [$PrecioI, $PrecioF])
                                        ->where('products.name-product', 'like', '%'.$texto.'%')
                                        ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }else if($PrecioI == 0 && $PrecioF == 0 && $Valor != 0){
                    $valoruno = $Valor - 0.5;
                    $valordos = $Valor + 0.5;
                     $productos = product::join('users', 'products.id-user','users.id-user')
                                        ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                        ->join('scores', 'products.id-product','scores.id-product')
                                        ->select('products.id-product','products.name-product','products.price-product','products.image-product')
                                        ->whereNull('bloqueds.id-bloqued')
                                        ->where('products.name-product', 'like', '%'.$texto.'%')
                                        ->groupBy('products.id-product')
                                        ->havingRaw("avg(`scores`.`quality-score`) >= $valoruno")
                                        ->havingRaw("avg(`scores`.`quality-score`) < $valordos")
                                        ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }else if($PrecioI == 0 && $PrecioF == 0 && $Valor == 0){
                    $productos = product::join('users', 'products.id-user','users.id-user')
                            ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                            ->whereNull('bloqueds.id-bloqued')
                            ->where('products.name-product', 'like', '%'.$texto.'%')
                            ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }
               
            }else{
                $busqueda = 1;
                $nombredepa= department::find($iddepa);
                if(($PrecioI != 0 || $PrecioF != 0 )&& $Valor != 0){
                    $valoruno = $Valor - 0.5;
                    $valordos = $Valor + 0.5;
                     $productos = product::join('users', 'products.id-user','users.id-user')
                                        ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                        ->join('scores', 'products.id-product','scores.id-product')
                                        ->select('products.id-product','products.name-product','products.price-product','products.image-product')
                                        ->whereNull('bloqueds.id-bloqued')
                                        ->where('products.id-department',$iddepa)
                                        ->whereBetween('products.price-product', [$PrecioI, $PrecioF])
                                        ->where('products.name-product', 'like', '%'.$texto.'%')
                                        ->groupBy('products.id-product')
                                        ->havingRaw("avg(`scores`.`quality-score`) >= $valoruno")
                                        ->havingRaw("avg(`scores`.`quality-score`) < $valordos")
                                        ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }else if($PrecioI != 0 || $PrecioF != 0 && $Valor == 0){
                    $productos = product::join('users', 'products.id-user','users.id-user')
                                        ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                        ->whereNull('bloqueds.id-bloqued')
                                        ->where('products.id-department',$iddepa)
                                        ->whereBetween('products.price-product', [$PrecioI, $PrecioF])
                                        ->where('products.name-product', 'like', '%'.$texto.'%')
                                        ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }else if($PrecioI == 0 && $PrecioF == 0 && $Valor != 0){
                    $valoruno = $Valor - 0.5;
                    $valordos = $Valor + 0.5;
                     $productos = product::join('users', 'products.id-user','users.id-user')
                                        ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                        ->join('scores', 'products.id-product','scores.id-product')
                                        ->select('products.id-product','products.name-product','products.price-product','products.image-product')
                                        ->whereNull('bloqueds.id-bloqued')
                                        ->where('products.id-department',$iddepa)
                                        ->where('products.name-product', 'like', '%'.$texto.'%')
                                        ->groupBy('products.id-product')
                                        ->havingRaw("avg(`scores`.`quality-score`) >= $valoruno")
                                        ->havingRaw("avg(`scores`.`quality-score`) < $valordos")
                                        ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }else if($PrecioI == 0 && $PrecioF == 0 && $Valor == 0){
                    $productos = product::join('users', 'products.id-user','users.id-user')
                            ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                            ->whereNull('bloqueds.id-bloqued')
                            ->where('products.id-department',$iddepa)
                            ->where('products.name-product', 'like', '%'.$texto.'%')
                            ->paginate(8);
                    return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
                }
            }
    }

    public function busquedadepartamento($id)
    {
        if(Session::has('Usuario')){
            $iddepa = $id;
            $busqueda = 1;
            $texto = '';
            $PrecioI = 0;
            $PrecioF = 0;
            $Valor = 0;
            $departamentos = department::all();
            $productos = product::join('users', 'products.id-user','users.id-user')
                                ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                ->whereNull('bloqueds.id-bloqued')
                                ->where('products.id-department',$iddepa)
                                ->where('products.name-product', 'like', '%'.$texto.'%')
                                ->paginate(8);
            $nombredepa= department::find($iddepa);
            return view('PDepartamento.Departamento')->with([
                                        'departamentos' => $departamentos,
                                        'productos' => $productos,
                                        'nombredepa' => $nombredepa,
                                        'busqueda' => $busqueda,
                                        'texto' => $texto,
                                        'iddepa' =>  $iddepa, 
                                        'PrecioI' =>  $PrecioI, 
                                        'PrecioF' =>  $PrecioF, 
                                        'Valor' =>  $Valor, 
                                    ]);
        }else{
            return redirect('/');
        }
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
        //
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
