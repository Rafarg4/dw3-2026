<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';
    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
        'estado',
        'id_profesor'
    ];
    public function profesor(){
        return $this->belongsTo(Profesor::class,'id');
    }
}
