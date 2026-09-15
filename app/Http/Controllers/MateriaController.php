<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Profesor;
class MateriaController extends Controller
{
    public function index(){
        $materias = Materia::with('profesor')->get();
       // return $materias;
        return view('materias.index', compact('materias'));
    }
     public function create (){
        $profesores = Profesor::all();
        return view('materias.create',compact('profesores'));
    }
     public function store(Request $request){
    //return $request->all();
    Materia::create([
        'nombre' => $request->input('nombre'),
        'descripcion' => $request->input('descripcion'),
        'codigo' => $request->input('codigo'),
        'id_profesor' => $request->input('id_profesor'),
    ]);
    return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente.');
     }
     public function edit($id)
    {
          $materias = Materia::findOrFail($id);
          $profesores = Profesor::all();
        return view('materias.edit',compact('materias','profesores'));
    }
     public function update(request $request,$id){
        $materias = Materia::findOrFail($id);
        $materias->update($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente.');
    }
    }

