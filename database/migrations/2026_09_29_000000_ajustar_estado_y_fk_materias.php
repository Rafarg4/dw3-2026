<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AjustarEstadoYFkMaterias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Las vistas trabajan con ACTIVO / INACTIVO en mayúsculas
        DB::statement("ALTER TABLE profesores ALTER COLUMN estado SET DEFAULT 'ACTIVO'");
        DB::statement("ALTER TABLE materias ALTER COLUMN estado SET DEFAULT 'ACTIVO'");
        DB::table('profesores')->where('estado', 'Activo')->update(['estado' => 'ACTIVO']);
        DB::table('materias')->where('estado', 'Activo')->update(['estado' => 'ACTIVO']);

        // id_profesor debe ser del mismo tipo que profesores.id para la foreign key
        DB::statement('ALTER TABLE materias MODIFY id_profesor BIGINT UNSIGNED NOT NULL');
        Schema::table('materias', function (Blueprint $table) {
            $table->foreign('id_profesor')->references('id')->on('profesores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->dropForeign(['id_profesor']);
        });
        DB::statement('ALTER TABLE materias MODIFY id_profesor INT NOT NULL');
        DB::statement("ALTER TABLE profesores ALTER COLUMN estado SET DEFAULT 'Activo'");
        DB::statement("ALTER TABLE materias ALTER COLUMN estado SET DEFAULT 'Activo'");
    }
}
