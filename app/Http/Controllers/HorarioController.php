<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Horario;
use App\Models\Materia;
class HorarioController extends Controller
{
    public function index(){
        $horarios = Horario::with('detalles.materia')
            ->orderByRaw("FIELD(dia, '" . implode("','", array_keys(Horario::DIAS)) . "')")
            ->get();
        return view('horarios.index', compact('horarios'));
    }
    public function create(){
        $materias = Materia::with('profesor')->orderBy('nombre')->get();
        $dias = Horario::DIAS;
        return view('horarios.create', compact('materias', 'dias'));
    }
    public function store(Request $request){
        $datos = $this->validar($request);

        DB::transaction(function () use ($datos) {
            $horario = Horario::create($datos);
            $horario->detalles()->createMany($datos['detalles']);
        });

        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
    }
    public function edit($id){
        $horario = Horario::with('detalles')->findOrFail($id);
        $materias = Materia::with('profesor')->orderBy('nombre')->get();
        $dias = Horario::DIAS;
        return view('horarios.edit', compact('horario', 'materias', 'dias'));
    }
    public function update(Request $request, $id){
        $horario = Horario::findOrFail($id);
        $datos = $this->validar($request, $horario->id);

        // Se reemplaza el detalle completo por lo que viene del formulario
        DB::transaction(function () use ($horario, $datos) {
            $horario->update($datos);
            $horario->detalles()->delete();
            $horario->detalles()->createMany($datos['detalles']);
        });

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }
    public function destroy($id){
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
    public function show($id){
        $horario = Horario::with('detalles.materia.profesor')->findOrFail($id);
        return view('horarios.show', compact('horario'));
    }
    private function validar(Request $request, $id = null){
        $datos = $request->validate([
            'dia' => ['required', Rule::in(array_keys(Horario::DIAS)), Rule::unique('horarios', 'dia')->ignore($id)],
            'observacion' => 'nullable|string|max:255',
            'estado' => 'required|in:ACTIVO,INACTIVO',
            'detalles' => 'required|array|min:1',
            'detalles.*.id_materia' => 'required|distinct|exists:materias,id',
            'detalles.*.hora_inicio' => 'nullable|date_format:H:i|required_with:detalles.*.hora_fin',
            'detalles.*.hora_fin' => 'nullable|date_format:H:i|after:detalles.*.hora_inicio',
        ], [
            'dia.unique' => 'Ya existe un horario cargado para ese día.',
            'detalles.required' => 'Debe agregar al menos una materia.',
            'detalles.*.id_materia.distinct' => 'La misma materia está repetida en el día.',
        ], [
            'detalles.*.id_materia' => 'materia',
            'detalles.*.hora_inicio' => 'hora de inicio',
            'detalles.*.hora_fin' => 'hora de fin',
        ]);
        $datos['detalles'] = array_values($datos['detalles']);
        return $datos;
    }
}


//Modulos requeridos
