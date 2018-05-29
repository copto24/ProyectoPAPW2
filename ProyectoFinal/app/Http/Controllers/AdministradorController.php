<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\country;
use App\User;
use App\cart;
use App\product;
use App\administrator;
use App\report;
use App\bloqued;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('Usuario')){
            return redirect('/principal');
        }else{
            $paises = country::all(); 
            return view('PAdmin.Admin3')->with('paises', $paises);
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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'correo' => 'required|unique:administrators,email-administrator|email',
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
        Storage::disk('fad')->put($nombreimagen,  \File::get($file));

        $buscar = user::where('email-user', $request->correo)->get();

        if($buscar->count() == 0){
            $admin = new administrator;
            $admin->{'first-name-administrator'} = $request->nombre;
            $admin->{'last-name-administrator'} = $request->apellido;
            $admin->{'email-administrator'} = $request->correo;
            $admin->{'password-administrator'} = bcrypt($request->contra);
            $admin->{'image-administrator'} = $nombreimagen;
            $admin->{'gender-administrator'} = $request->optradio;

            $admin->save();
            return redirect('/');
        }else{
             return redirect('/adminadmin')->with('message','1');
        }
    }

     public function reportes(Request $request)
    {
        if(Session::has('Usuario')){
            return redirect('/principal');

        }else if(Session::has('Administrador')){
            $reportes = report::join('products as P', 'reports.id-product','P.id-product')
                                ->join('users as R', 'reports.id-user','R.id-user')
                                ->join('users as A', 'P.id-user','A.id-user')
                                ->join('reasons as RE', 'reports.id-reason','RE.id-reason')
                                ->select('A.id-user as Acusado', 'R.id-user as Reportante', 'P.id-product as IDProducto', 'RE.id-reason as IDRazon', 'R.first-name-user as Primer', 'R.last-name-user as Ultimo', 'RE.name-reason as Razon', 'P.name-product as Producto')
                                ->paginate(8);
                                /*->join('users', 'products.id-user','users.id-user')
                                ->join('reasons', 'reports.id-reason','reasons.id-reason')
                                ->select('users.id-user', 'users.first-name-user', 'users.last-name-user',
                                        'products.id-product','products.name-product', 'reasons.id-reason',
                                         'reasons.name-reason')
                                ->paginate(8);*/
            return view('PAdmin.Admin1')->with([
                                        'reportes' => $reportes
                                    ]);

        }else{
            return redirect('/');
        }
    }

     public function bloqueos(Request $request)
    {
        if(Session::has('Usuario')){
            return redirect('/principal');

        }else if(Session::has('Administrador')){
                $bloqueos = bloqued::join('users', 'bloqueds.id-user','users.id-user')
                                    ->join('administrators', 'bloqueds.id-administrator','administrators.id-administrator')
                                    ->join('reasons', 'bloqueds.id-reason','reasons.id-reason')
                                ->paginate(8);
                return view('PAdmin.Admin2')->with([
                                        'bloqueos' => $bloqueos
                                    ]);

        }else{
            return redirect('/');
        }
    }

    public function bloquear(Request $request)
    {
        $carritos = product::join('carts', 'products.id-product','carts.id-product')
                            ->where('products.id-user', $request->idusuarioA)
                            ->whereNull('carts.deleted_at')
                            ->select('carts.id-cart as IDCarrito','products.id-user as Vendedor','carts.id-user as Comprador','products.id-product as IDProducto','products.name-product as Producto','carts.amount-cart as CantCar')
                            ->get();  

        if ($carritos->count()!=0) {
            for ($i=0; $i < $carritos->count(); $i++) { 
                $producto = product::find($carritos[$i]->IDProducto);
                $cantidadnueva = $producto->{'amount-product'} + $carritos[$i]->CantCar;
                $producto->{'amount-product'} = $cantidadnueva;
                $producto->save();

                $carritouno = cart::find($carritos[$i]->IDCarrito);
                $carritouno->delete();
            }

        }


        $reportes = report::where('id-user', $request->idusuarioR)->get();
        for ($i=0; $i < $reportes->count(); $i++) { 
            $reporteactual = report::find($reportes[$i]->{'id-report'});
            $reporteactual->delete();
        }


        $idAdmin = Session::get('Administrador')->{'id-administrator'};
        $bloqueo = new bloqued;
        $bloqueo->{'id-administrator'} = $idAdmin;
        $bloqueo->{'id-user'} = $request->idusuarioA;
        $bloqueo->{'id-reason'} = $request->idrazon;
        $bloqueo->save();


         return redirect('/adminadmin/reportes')->with('message','1'); 
    }

    public function desbloquear(Request $request)
    {
        $bloqueado = bloqued::find($request->idbloqueo);
        $bloqueado->forcedelete();
        return redirect('/adminadmin/bloqueos')->with('message','1');
    }

    public function logout(Request $request){
            $request->session()->forget('Administrador');
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
