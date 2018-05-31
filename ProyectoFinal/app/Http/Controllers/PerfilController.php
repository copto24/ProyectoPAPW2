<?php

namespace App\Http\Controllers;

use App\User;
use App\department;
use App\product;
use App\bloqued;
use Session;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function verperfil($id)
    {
        if(Session::has('Usuario')){
            $usuariobloqueado = bloqued::join('users', 'bloqueds.id-user','users.id-user')->where('users.id-user', $id)->get();
            if ($usuariobloqueado->count()==0) {
                 $usuario = User::join('countries', 'users.id-country','countries.id-country')->where('users.id-user', $id)->get();
           //dd($usuario);
                 $productos = product::where('id-user', $id)->paginate(4);
                 $departamentos = department::all(); 
                return view('PPerfil.Perfil')->with('usuario', $usuario)->with('productos', $productos)->with('departamentos', $departamentos);
            }else{
                return redirect('/principal')->with('message','2');
            }
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
