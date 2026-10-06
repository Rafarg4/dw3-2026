<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $datos = $request->validate($this->reglas());
        Profesor::create($datos);
        return redirect()->route('profesores.index')->with('success', 'Profesor creado exitosamente.');
    }
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesores.edit', compact('profesor'));
    }
    public function update(Request $request,$id){
        $profesor = Profesor::findOrFail($id);
        $datos = $request->validate($this->reglas($profesor->id));
        $profesor->update($datos);
        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado exitosamente.');
    }
    public function destroy($id){
        $profesor = Profesor::findOrFail($id);
        if ($profesor->materias()->exists()) {
            return redirect()->route('profesores.index')->with('error', 'No se puede eliminar el profesor porque tiene materias asignadas.');
        }
        $profesor->delete();
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente.');
    }
    public function show($id){
        $profesor = Profesor::findOrFail($id);
        return view('profesores.show', compact('profesor'));
    }
    private function reglas($id = null){
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'documento' => ['required', 'string', 'max:20', Rule::unique('profesores', 'documento')->ignore($id)],
            'telefono' => 'nullable|string|max:20',
            'email' => ['required', 'email', 'max:100', Rule::unique('profesores', 'email')->ignore($id)],
            'especialidad' => 'required|string|max:100',
            'estado' => 'required|in:ACTIVO,INACTIVO',
        ];
    }
}
