<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
class MateriaController extends Controller
{
    public function index(){
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }
     public function create (){
        
        return view('materias.create');
    }
     public function store(Request $request){
    //return $request->all();
    Materia::create([
        'nombre' => $request->input('nombre'),
        'descripcion' => $request->input('descripcion'),
        'codigo' => $request->input('codigo'),
    ]);
    return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente.');
     }
    }

