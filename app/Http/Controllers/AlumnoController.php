<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
class AlumnoController extends Controller
{
    public function index(){
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }
    public function create (){
        return view('alumnos.create');
    }
    public function store(Request $request){
       
        $datos = $request->validate($this->reglas());
        //return $datos;
        if($request->hasFile('foto')){
        $foto = $request->file('foto');
        //Generar un registro unico
        $nombreFoto = time(). '_' . $foto->getClientOriginalName();
        //Mover la foto
        $foto->move(public_path('foto_alumno'), $nombreFoto);
        //Guardar solamente el nombre
        $datos['foto'] = $nombreFoto;
        }
        Alumno::create($datos);
        return redirect()->route('alumnos.index')->with('success', 'Alumnos creada exitosamente.');
    }
     private function reglas($id = null){
        return [
            'documento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'foto' => 'required',
            'observacion' => 'required',
            'fecha_nac'   => 'nullable|date',
            ];
    }
}
