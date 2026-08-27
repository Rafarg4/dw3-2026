<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
class ProfesorController extends Controller
{
    public function index(){
        $profesores = Profesor::all(); 
        return view('profesores.index', compact('profesores'));
    }
    public function create (){
        return view('profesores.create');
    }
    public function store(Request $request){
    //return $request->all();
    Profesor::create([
        'nombre' => $request->input('nombre'),
        'apellido' => $request->input('apellido'),
        'email' => $request->input('email'),
        'telefono' => $request->input('telefono'),
        'documento' => $request->input('documento'),
        'especialidad' => $request->input('especialidad'),
    ]);
    return redirect()->route('profesores.index')->with('success', 'Profesor creado exitosamente.');
    }
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesores.edit', compact('profesor'));
    }
    public function update(request $request,$id){
        $profesor = Profesor::findOrFail($id);
        $profesor->update($request->all());
        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente.');
    }
    public function destroy($id){
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente.');
    }
    public function show($id){
        $profesor = Profesor::findOrFail($id);
        return view('profesores.show', compact('profesor'));
    }
}
