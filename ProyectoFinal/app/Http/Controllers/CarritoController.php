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

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('Usuario')){
            $iduser = Session::get('Usuario')->{'id-user'};
            $total = 0;
            $carritos = cart::join('products', 'carts.id-product','products.id-product')
                                ->where('carts.id-user', $iduser)
                                ->paginate(2);

            $carrtotal = cart::join('products', 'carts.id-product','products.id-product')
                                ->where('carts.id-user', $iduser)
                                ->get();                   
            for ($i=0; $i < $carrtotal->count(); $i++) { 
                $preciopr = $carrtotal[$i]->{'price-product'};
                $cantpr = $carrtotal[$i]->{'amount-cart'};
                $subtotal = $preciopr * $cantpr;
                $total = $total + $subtotal;
            }               
            return view('PCarrito.Carrito')->with([
                                        'carritos' => $carritos,
                                        'total' => $total
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
