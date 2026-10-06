<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    // Valor que se guarda => texto que se muestra
    const DIAS = [
        'LUNES' => 'Lunes',
        'MARTES' => 'Martes',
        'MIERCOLES' => 'Miércoles',
        'JUEVES' => 'Jueves',
        'VIERNES' => 'Viernes',
        'SABADO' => 'Sábado',
    ];

    protected $table = 'horarios';
    protected $fillable = [
        'dia',
        'observacion',
        'estado',
    ];
    public function detalles(){
        return $this->hasMany(HorarioDetalle::class,'id_horario')->orderBy('hora_inicio');
    }
    public function getDiaNombreAttribute(){
        return self::DIAS[$this->dia] ?? $this->dia;
    }
}
