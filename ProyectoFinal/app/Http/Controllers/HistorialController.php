<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\product;
use App\User;
use App\comment;
use App\purchase;
use App\report;
use App\reason;
use App\score;
use App\cart;

use Session;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('Usuario')){
            $idusuario = Session::get('Usuario')->{'id-user'};
            $histos = purchase::join('products', 'purchases.id-product','products.id-product')
                            ->where('purchases.id-user', $idusuario)
                            ->orderBy('purchases.created_at', 'desc')
                            ->paginate(10); 
            return view('PHistorial.Historial')->with('histos', $histos);
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
