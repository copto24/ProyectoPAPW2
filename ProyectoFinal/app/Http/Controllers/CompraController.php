<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\product;
use App\User;
use App\comment;
use App\report;
use App\reason;
use App\score;
use App\cart;

use Session;

class CompraController extends Controller
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

    public function verproducto($id , $orden)
    {
       if(Session::has('Usuario')){
           //dd($usuario);
           $departamentos = department::all(); 
           $razones = reason::all();
           $calificacion = product::join('scores', 'products.id-product','scores.id-product')
                                    ->where('products.id-product', $id)
                                    ->avg('scores.quality-score');
            if(is_null($calificacion)){
                $calificacion = 0;
            }else{
                $calificacion = round($calificacion, 0);
            } 
            $iduser = Session::get('Usuario')->{'id-user'};
            $scoreusuario = user::join('scores', 'users.id-user','scores.id-user')
                                ->join('products', 'scores.id-product','products.id-product')
                                ->where('scores.id-user', $iduser )
                                ->where('scores.id-product',  $id )
                                ->get();   

            if($scoreusuario->count() == 0){
                $scoreusuario = 0;
            }else{
                $scoreusuario = $scoreusuario[0]->{'quality-score'};
            }
           $products = product::join('users', 'products.id-user','users.id-user')
                                ->where('products.id-product', $id)
                                ->get();

            if($orden == 1){
                $comentarios = comment::join('products', 'comments.id-product','products.id-product')
                                        ->join('users', 'comments.id-user','users.id-user')
                                        ->where('comments.id-product',  $id )
                                        ->orderBy('comments.created_at', 'desc')
                                        ->select('comments.created_at', 'users.first-name-user','users.last-name-user', 'users.image-user', 'description-comment', 'comments.id-user')
                                        ->paginate(6);
            }else{
                 $comentarios = comment::join('products', 'comments.id-product','products.id-product')
                                        ->join('users', 'comments.id-user','users.id-user')
                                        ->where('comments.id-product',  $id )
                                        ->orderBy('comments.created_at', 'asc')
                                        ->select('comments.created_at', 'users.first-name-user','users.last-name-user', 'users.image-user', 'description-comment', 'comments.id-user')
                                        ->paginate(6);
            }
           return view('PProducto.Producto')->with([
                                        'departamentos' => $departamentos,
                                        'razones' => $razones,
                                        'products' => $products,
                                        'calificacion' => $calificacion,
                                        'scoreusuario' => $scoreusuario,
                                        'orden'=>$orden,
                                        'comentarios' => $comentarios
                                    ]);
        }else{
            return redirect('/');
        }
    }

    public function calificar(Request $request)
    {
        $iduser = Session::get('Usuario')->{'id-user'};
        $idproducto = $request->id;
        $scoreusuario = user::join('scores', 'users.id-user','scores.id-user')
                    ->join('products', 'scores.id-product','products.id-product')
                    ->where('scores.id-user', $iduser )
                    ->where('scores.id-product', $idproducto)
                    ->get(); 

        $usuarioproducto = user::join('products', 'users.id-user','products.id-user')
                    ->where('products.id-user', $iduser)
                    ->where('products.id-product', $idproducto)
                    ->get(); 

        $yacalifico = user::join('purchases', 'users.id-user','purchases.id-user')
                            ->join('products', 'purchases.id-product','products.id-product')
                            ->where('purchases.id-user', $iduser)
                            ->where('purchases.id-product', $idproducto)
                            ->get(); 

        if($usuarioproducto->count() != 0){
            return redirect('/Producto/'.$idproducto.'/'.$request->orden)->with('message','1');
        }else{    
            if($yacalifico->count() != 0){
                if($scoreusuario->count() == 0){
                    $puntuacion = new score;
                    $puntuacion->{'quality-score'} = $request->optradio;
                    $puntuacion->{'id-user'} = $iduser;
                    $puntuacion->{'id-product'} = $idproducto;
                    $puntuacion->save();
                    return redirect('/Producto/'.$idproducto.'/'.$request->orden);
                }else{
                    $idscore = $scoreusuario[0]->{'id-score'};
                    $puntuacion = score::find($idscore);
                    $puntuacion->{'quality-score'} = $request->optradio;
                    $puntuacion->save();
                    return redirect('/Producto/'.$idproducto.'/'.$request->orden);
                }
            }else{
                return redirect('/Producto/'.$idproducto.'/'.$request->orden)->with('message','5');
            }
        }
        
    }

    public function reportar(Request $request)
    {
        $iduser = Session::get('Usuario')->{'id-user'};
        $idproducto = $request->id;
        $reporteusuario = user::join('reports', 'users.id-user','reports.id-user')
                    ->join('products', 'reports.id-product','products.id-product')
                    ->whereNull('reports.deleted_at')
                    ->where('reports.id-user', $iduser )
                    ->where('reports.id-product', $idproducto)
                    ->get();   
        $usuarioproducto = user::join('products', 'users.id-user','products.id-user')
                                ->where('products.id-user', $iduser)
                                ->where('products.id-product', $idproducto)
                                ->get(); 

       if($usuarioproducto->count() != 0){
            return redirect('/Producto/'.$idproducto.'/'.$request->orden)->with('message','4');
       }else{
            if($reporteusuario->count() == 0){
                $reporte = new report;
                $reporte->{'id-user'} = $iduser;
                $reporte->{'id-product'} = $idproducto;
                $reporte->{'id-reason'} = $request->reporte;
                $reporte->save();
                return redirect('/Producto/'.$idproducto.'/'.$request->orden)->with('message','2');
            }else{
                return redirect('/Producto/'.$idproducto.'/'.$request->orden)->with('message','3');
            }
        }
        
    }

    public function comentar(Request $request)
    {
        $rules = [
            'comentar' => 'required'
        ];
             
        $messages = [
            'comentar.required' => 'Debe escribir algo.'
        ];
        
       $this->validate($request, $rules, $messages);

       $iduser = Session::get('Usuario')->{'id-user'};
       $idproducto = $request->id;
       $hoy = getdate();
       $comentario = new comment;
       $comentario->{'description-comment'} = $request->comentar;
       $comentario->{'date-comment'} = '2000-01-01 00:00:00';
       $comentario->{'id-user'} = $iduser;
       $comentario->{'id-product'} = $idproducto;
       $comentario->save();
        return redirect('/Producto/'.$idproducto.'/'.$request->orden);
        
    }

    public function ordenar(Request $request)
    { 
        return redirect('/Producto/'.$request->id.'/'.$request->ordencoment);
        
    }

    public function comprar(Request $request)
    { 
        $iduser = Session::get('Usuario')->{'id-user'};
        $idproducto = $request->id;
        $usuarioproducto = user::join('products', 'users.id-user','products.id-user')
                        ->where('products.id-user', $iduser)
                        ->where('products.id-product', $idproducto)
                        ->get(); 



        if($usuarioproducto->count() != 0){
            return redirect('/Producto/'.$idproducto.'/'.$request->orden)->with('message','8');
        }else{
            $infoproducto = product::find($request->id);
            $cantstock = $infoproducto->{'amount-product'};
            if($request->cantidad <= $cantstock){
                $verificar = cart::join('products', 'carts.id-product','products.id-product')
                                    ->join('users', 'carts.id-user','users.id-user')
                                    ->where('carts.id-user', $iduser)
                                    ->where('carts.id-product', $idproducto)
                                    ->get(); 
                if($verificar->count() == 0){
                    $nuevacantidad = $cantstock - $request->cantidad;
                    $producto = product::find($idproducto);
                    $producto->{'amount-product'} = $nuevacantidad;
                    $producto->save();

                    $carrito = new cart;
                    $carrito->{'id-user'} = $iduser;
                    $carrito->{'id-product'} = $idproducto;
                    $carrito->{'amount-cart'} = $request->cantidad;
                    $carrito->save();

                    return redirect('/Producto/'.$request->id.'/'.$request->orden)->with('message','7');
                }else{
                    $nuevacantidad = $cantstock - $request->cantidad;
                    $producto = product::find($idproducto);
                    $producto->{'amount-product'} = $nuevacantidad;
                    $producto->save();

                    $carrito = cart::find($verificar[0]->{'id-cart'});
                    $newcantcar = $carrito->{'amount-cart'} + $request->cantidad;
                    $carrito->{'amount-cart'} = $newcantcar;
                    $carrito->save();

                    return redirect('/Producto/'.$request->id.'/'.$request->orden)->with('message','7');
                }
            }else{
                return redirect('/Producto/'.$request->id.'/'.$request->orden)->with('message','6');
            }
        }
        

        /* $reporte = new report;
                $reporte->{'id-user'} = $iduser;
                $reporte->{'id-product'} = $idproducto;
                $reporte->{'id-reason'} = $request->reporte;
                $reporte->save();*/
        
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
