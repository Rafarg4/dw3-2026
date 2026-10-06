<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/prueba', [App\Http\Controllers\Prueba::class, 'index']);

// Módulos del sistema: solo con sesión iniciada
Route::middleware(['auth'])->group(function () {
    //Rutas de profesores
    Route::get('/profesores/index', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesores.index');
    Route::get('/profesores/create', [App\Http\Controllers\ProfesorController::class, 'create'])->name('profesores.create');
    Route::post('/profesores/store', [App\Http\Controllers\ProfesorController::class, 'store'])->name('profesores.store');
    Route::get('/profesores/edit/{id}', [App\Http\Controllers\ProfesorController::class, 'edit'])->name('profesores.edit');
    Route::put('/profesores/update/{id}', [App\Http\Controllers\ProfesorController::class, 'update'])->name('profesores.update');
    Route::delete('/profesores/destroy/{id}', [App\Http\Controllers\ProfesorController::class, 'destroy'])->name('profesores.destroy');
    Route::get('/profesores/show/{id}', [App\Http\Controllers\ProfesorController::class, 'show'])->name('profesores.show');
    //Rutas de materias
    Route::get('/materias/index', [App\Http\Controllers\MateriaController::class, 'index'])->name('materias.index');
    Route::get('/materias/create', [App\Http\Controllers\MateriaController::class, 'create'])->name('materias.create');
    Route::post('/materias/store', [App\Http\Controllers\MateriaController::class, 'store'])->name('materias.store');
    Route::get('/materias/edit/{id}', [App\Http\Controllers\MateriaController::class, 'edit'])->name('materias.edit');
    Route::put('/materias/update/{id}', [App\Http\Controllers\MateriaController::class, 'update'])->name('materias.update');
    Route::delete('/materias/destroy/{id}', [App\Http\Controllers\MateriaController::class, 'destroy'])->name('materias.destroy');
    Route::get('/materias/show/{id}', [App\Http\Controllers\MateriaController::class, 'show'])->name('materias.show');
    //Rutas de horarios
    Route::get('/horarios/index', [App\Http\Controllers\HorarioController::class, 'index'])->name('horarios.index');
    Route::get('/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('horarios.create');
    Route::post('/horarios/store', [App\Http\Controllers\HorarioController::class, 'store'])->name('horarios.store');
    Route::get('/horarios/edit/{id}', [App\Http\Controllers\HorarioController::class, 'edit'])->name('horarios.edit');
    Route::put('/horarios/update/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('horarios.update');
    Route::delete('/horarios/destroy/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('horarios.destroy');
    Route::get('/horarios/show/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('horarios.show');
    //Rutas de Alumnos
    Route::get('/alumnos/index', [App\Http\Controllers\AlumnoController::class, 'index'])->name('alumnos.index');
    Route::get('/alumnos/create', [App\Http\Controllers\AlumnoController::class, 'create'])->name('alumnos.create');
    Route::post('/alumnos/store', [App\Http\Controllers\AlumnoController::class, 'store'])->name('alumnos.store');
    
    });

require __DIR__.'/auth.php';
