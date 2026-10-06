<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cabecera: un registro por día
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('dia', 20)->unique();
            $table->string('observacion', 255)->nullable();
            $table->string('estado', 20)->default('ACTIVO');
            $table->timestamps();
        });

        // Detalle: las materias de cada día
        Schema::create('horario_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_horario')->constrained('horarios')->cascadeOnDelete();
            $table->foreignId('id_materia')->constrained('materias');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->timestamps();

            $table->unique(['id_horario', 'id_materia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_detalles');
        Schema::dropIfExists('horarios');
    }
}
