<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use App\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AjustesController extends Controller
{

	public function index()
    {
        $paises = country::all(); 
        return view('PAjustes.Ajustes')->with('paises', $paises);
    }


}
