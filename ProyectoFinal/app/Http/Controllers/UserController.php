<?php

namespace App\Http\Controllers;

use App\User;
use App\administrator;
use App\bloqued;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'foto.mimes' => 'La foto debe ser jpg o png.',
            'correo.unique' => 'El correo ya existe.',
        ];
        
       $this->validate($request, $rules, $messages);
         
        $file = $request->file('foto');
        $nombreimagen = $file->getClientOriginalName();
        Storage::disk('local')->put($nombreimagen,  \File::get($file));
        
        $buscar = administrator::where('email-administrator', $request->correo)->get();

        if($buscar->count() == 0){
            $usuario = new User;
            $usuario->{'first-name-user'} = $request->nombre;
            $usuario->{'last-name-user'} = $request->apellido;
            $usuario->{'email-user'} = $request->correo;
            $usuario->{'password-user'} = bcrypt($request->contra);
            $usuario->{'image-user'} = $nombreimagen;
            $usuario->{'birthdate-user'} = $request->fecha;
            $usuario->{'gender-user'} = $request->optradio;
            $usuario->{'id-country'} = $request->pais;

            $usuario->save();
            return redirect('/')->with('message','1');
        }else{
            return redirect('/')->with('message','3');
        }
    }


    public function login(Request $request){

        $Usuarios = user::all(); 
        $Adminstradores = administrator::all(); 
        $idusuario = 0;
        $notificacionus = 0;
        $notificacionadmin = 0;

        foreach ($Adminstradores as $administrator)
        {
            if (Hash::check($request->contra, $administrator->{'password-administrator'}) && $request->correo == $administrator->{'email-administrator'}) {
                $idadmin = $administrator->{'id-administrator'};
                $notificacionadmin = 0;
                break;
            }else{
                $notificacionadmin = 1;
            }
        }


        if($notificacionadmin == 0){
            $adminvalidado = administrator::find($idadmin);
            $request->session()->put('Administrador', $adminvalidado);
            return redirect('/adminadmin/reportes');
        }else{
            foreach ($Usuarios as $user)
            {
                if (Hash::check($request->contra, $user->{'password-user'}) && $request->correo == $user->{'email-user'}) {
                    $idusuario = $user->{'id-user'};
                    $notificacionus = 0;
                    break;
                }else{
                    $notificacionus = 1;
                }
            }
             if($notificacionus == 1){
            return redirect('/')->with('message','2');
            }else{
                $Validarbloqueo = bloqued::join('users', 'bloqueds.id-user','users.id-user')
                                            ->where('users.email-user', $request->correo)
                                            ->get();
                if($Validarbloqueo->count()==0){
                    $Usuariovalidado = User::find($idusuario);
                    $request->session()->put('Usuario', $Usuariovalidado);
                    return redirect('/principal');
                }else{
                    return redirect('/')->with('message','4');
                }

            }

        }

        /*if($usuario != NULL){
            $request->session()->put('Usuario', $usuario);
            return redirect('/principal');
            //$sesion = $request->session()->all();
            //if($request->session()->has('Usuario')) {
              //  echo session::get('Usuario')->{'image-user'};
             //}
            //dd($imagen);
        }else{
           return redirect('/');
        })*/
        
    }

     public function logout(Request $request){
            $request->session()->forget('Usuario');
            return redirect('/'); 
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
    public function update(Request $request)
    {   
        $rules = [
            'correo' => 'email',
            'foto' => 'mimes:jpeg,jpg,png|max:2024'
        ];
             
        $messages = [
            'contra.min' => 'La contraseña debe tener 3 caracteres minimo.',
            'foto.max' => 'La foto no debe pesar mas de 2MB.',
            'foto.mimes' => 'La foto debe ser jpg o png.'
        ];
        
       $this->validate($request, $rules, $messages);

       $longitud = strlen($request->contra);
        $buscar = administrator::where('email-administrator', $request->correo)->get();
        
        if($buscar->count() == 0){
               if($longitud >= 3 || $longitud == 0){
                    $longitud = strlen($request->correo);
                    $notificacion = 0;

                    if($longitud != 0){
                        $Usuarios = user::all(); 
                        $correosesion = Session::get('Usuario')->{'email-user'};
                        foreach ($Usuarios as $user){
                        if ($request->correo == $user->{'email-user'} && $correosesion != $user->{'email-user'}){
                                $notificacion = 1;
                                break;
                            }else{
                                $notificacion = 0;
                            }
                        }
                    }else{
                        $notificacion == 0;
                    }

                    if($notificacion == 0){
                        $id = Session::get('Usuario')->{'id-user'};
                        $usuario = User::find($id);
                        if($request->nombre != NULL){
                            $usuario->{'first-name-user'} = $request->nombre;
                        }
                        if($request->apellido != NULL){
                            $usuario->{'last-name-user'} = $request->apellido;
                        }
                        $usuario->{'birthdate-user'} = $request->fecha;
                        $usuario->{'id-country'} = $request->pais;
                        if($request->correo != NULL){
                            $usuario->{'email-user'} = $request->correo;
                        }
                        if($request->contra != NULL){
                            $usuario->{'password-user'} = bcrypt($request->contra);
                        }
                        $usuario->{'gender-user'} = $request->optradio;
                        $file = $request->file('foto');
                        if($file != NULL){
                            $path = Session::get('Usuario')->{'image-user'};
                            Storage::disk('local')->delete($path);

                            $nombreimagen = $file->getClientOriginalName();
                            Storage::disk('local')->put($nombreimagen,  \File::get($file));
                            $usuario->{'image-user'} = $nombreimagen;
                        }
                        $usuario->save();
                        $request->session()->forget('Usuario');
                        $request->session()->put('Usuario', $usuario);
                        return redirect('/principal')->with('message','1');

                    }else{
                        return redirect('/ajustes')->with('message','2');
                    }

               }else{
                    return redirect('/ajustes')->with('message','1');
               }
        }else{
            return redirect('/ajustes')->with('message','2');
        }

        /*$usuario->{'first-name-user'} = $request->nombre;
        $usuario->save();

        $file = $request->file('foto');
        if($file == NULL){
            return 'NULO';
        }else{
           return 'No NULO'; 
       }

        $id = Session::get('Usuario')->{'id-user'};

        $file = $request->file('foto');
        $nombreimagen = $file->getClientOriginalName();
        Storage::disk('local')->put($nombreimagen,  \File::get($file));

        $usuario = User::find($id);
        $usuario->{'first-name-user'} = $request->nombre;
        $usuario->{'last-name-user'} = $request->apellido;
        $usuario->{'email-user'} = $request->correo;
        $usuario->{'password-user'} = $request->contra;
        $usuario->{'image-user'} = $nombreimagen;
        $usuario->{'birthdate-user'} = $request->fecha;
        $usuario->{'gender-user'} = $request->optradio;
        $usuario->{'id-country'} = $request->pais;

        $usuario->save();
        $request->session()->forget('Usuario');
        $request->session()->put('Usuario', $usuario);
        return redirect('/principal');*/
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
