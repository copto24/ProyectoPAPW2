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

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('Usuario')){
            $productospopulares = product::inRandomOrder()
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->limit(10)
                                    ->get();
            $productoselectronicos = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Electronicos')
                                    ->limit(5)
                                    ->get();
            $productospeliculas = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Peliculas')
                                    ->limit(5)
                                    ->get();
            $productosropas = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Ropa')
                                    ->limit(5)
                                    ->get();
            $productosdeportes = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Deporte')
                                    ->limit(5)
                                    ->get();
            $productoshogares = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Hogar')
                                    ->limit(5)
                                    ->get();
            $productosmusicas = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Musica')
                                    ->limit(5)
                                    ->get();
            $productosjuguetes = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Juguetes')
                                    ->limit(5)
                                    ->get();
            $productoslibros = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Libros')
                                    ->limit(5)
                                    ->get();
            $productosoficinas = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Oficina')
                                    ->limit(5)
                                    ->get();
            $productossalud = product::inRandomOrder()
                                    ->join('departments', 'products.id-department','departments.id-department')
                                    ->join('users', 'products.id-user','users.id-user')
                                    ->leftJoin('bloqueds', 'users.id-user','bloqueds.id-user')
                                    ->whereNull('bloqueds.id-bloqued')
                                    ->where('departments.name-department', 'Salud')
                                    ->limit(5)
                                    ->get();

            $departamentos = department::all(); 
            return view('PHome.Home')->with([
                                        'departamentos' => $departamentos,
                                        'productospopulares' => $productospopulares,
                                        'productoselectronicos' => $productoselectronicos,
                                        'productospeliculas' => $productospeliculas,
                                        'productosropas' => $productosropas,
                                        'productosdeportes' => $productosdeportes,
                                        'productoshogares' => $productoshogares,
                                        'productosmusicas' => $productosmusicas,
                                        'productosjuguetes' => $productosjuguetes,
                                        'productoslibros' => $productoslibros,
                                        'productosoficinas' => $productosoficinas,
                                        'productossalud' => $productossalud
                                    ]);
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
        //
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
