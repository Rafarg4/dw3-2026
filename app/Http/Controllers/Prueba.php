<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prueba extends Controller
{
    //Crear mi funcion para retornar mi vista 
    public function index()
    {
        $mensaje = "Hola mundo desde mi controlador";
        $mensaje2 = "Hola mundo desde mi controlador 2";
        return view('prueba', compact('mensaje', 'mensaje2'));
    }
}
