<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Materia;
use App\Models\Profesor;
class MateriaController extends Controller
{
    public function index(){
        $materias = Materia::with('profesor')->get();
        return view('materias.index', compact('materias'));
    }
    public function create (){
        $profesores = Profesor::all();
        return view('materias.create',compact('profesores'));
    }
    public function store(Request $request){
        $datos = $request->validate($this->reglas());
        Materia::create($datos);
        return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente.');
    }
    public function edit($id)
    {
        $materias = Materia::findOrFail($id);
        $profesores = Profesor::all();
        return view('materias.edit',compact('materias','profesores'));
    }
    public function update(Request $request,$id){
        $materias = Materia::findOrFail($id);
        $datos = $request->validate($this->reglas($materias->id));
        $materias->update($datos);
        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente.');
    }
    public function destroy($id){
        $materia = Materia::findOrFail($id);
        if ($materia->horarioDetalles()->exists()) {
            return redirect()->route('materias.index')->with('error', 'No se puede eliminar la materia porque está asignada en un horario.');
        }
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada exitosamente.');
    }
    public function show($id){
        $materia = Materia::with('profesor')->findOrFail($id);
        return view('materias.show', compact('materia'));
    }
    private function reglas($id = null){
        return [
            'nombre' => 'required|string|max:100',
            'id_profesor' => 'required|exists:profesores,id',
            'codigo' => ['required', 'string', 'max:20', Rule::unique('materias', 'codigo')->ignore($id)],
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|in:ACTIVO,INACTIVO',
        ];
    }
}
