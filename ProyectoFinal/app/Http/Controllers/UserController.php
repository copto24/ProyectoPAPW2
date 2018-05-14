<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "HOLA INDEX";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "HOLA CREATE";
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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'fecha' => 'required',
            'pais' => 'required',
            'correo' => 'required|unique:users,email-user|email',
            'contra' => 'required|min:3',
            'foto' => 'required|mimes:jpeg,jpg,png|max:2024',
            'optradio' =>  'required'
        ];
             
        $messages = [
            'contra.min' => 'La contraseña debe tener 3 caracteres minimo.',
            'foto.max' => 'La foto no debe pesar mas de 2MB.',
            'correo.unique' => 'El correo ya existe.',
        ];
        
       $this->validate($request, $rules, $messages);
         
        $file = $request->file('foto');
        $nombreimagen = $file->getClientOriginalName();
        Storage::disk('local')->put($nombreimagen,  \File::get($file));
        

        $usuario = new User;
        $usuario->{'first-name-user'} = $request->nombre;
        $usuario->{'last-name-user'} = $request->apellido;
        $usuario->{'email-user'} = $request->correo;
        $usuario->{'password-user'} = $request->contra;
        $usuario->{'image-user'} = $nombreimagen;
        $usuario->{'birthdate-user'} = $request->fecha;
        $usuario->{'gender-user'} = $request->optradio;
        $usuario->{'low-user'} = 0;
        $usuario->{'id-country'} = $request->pais;

        $usuario->save();
        return redirect('principal');
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
