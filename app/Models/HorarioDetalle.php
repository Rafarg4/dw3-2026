<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDetalle extends Model
{
    use HasFactory;
    protected $table = 'horario_detalles';
    protected $fillable = [
        'id_horario',
        'id_materia',
        'hora_inicio',
        'hora_fin',
    ];
    public function horario(){
        return $this->belongsTo(Horario::class,'id_horario');
    }
    public function materia(){
        return $this->belongsTo(Materia::class,'id_materia');
    }
}
