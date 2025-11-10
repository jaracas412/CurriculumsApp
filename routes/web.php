<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ImagenController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('about', [MainController::class, 'about'])->name('about');


Route::get('alumno', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('alumno', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('alumno/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
Route::get('alumno/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('alumno/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('alumno/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');


Route::get('alumno/{alumno}/pdf', [AlumnoController::class, 'downloadPDF'])->name('alumnos.pdf');

Route::get('imagen/{id}', [ImagenController::class, 'imagen'])->name('imagen.imagen');
