<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Prueba;
use Faker\Guesser\Name;

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
Route::get('/prueba', [App\Http\Controllers\Prueba::class, 'index']);
Route::get('/index', [App\Http\Controllers\ProfesorController::class, 'index'])->name('profesores.index');
Route::get('/create', [App\Http\Controllers\ProfesorController::class, 'create'])->name('profesores.create');
Route::post('/store', [App\Http\Controllers\ProfesorController::class, 'store'])->name('profesores.store');
Route::get('/edit/{id}', [App\Http\Controllers\ProfesorController::class, 'edit'])->name('profesores.edit');
Route::put('/update/{id}', [App\Http\Controllers\ProfesorController::class, 'update'])->name('profesores.update');
Route::delete('/destroy/{id}', [App\Http\Controllers\ProfesorController::class, 'destroy'])->name('profesores.destroy');