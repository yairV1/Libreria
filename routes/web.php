<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriasController;


// estas rutas es la forma profesional de hacerla mas rapido y eficiente ya que redirije todas las rutas a un controlador y este se encarga de manejar cada una de las acciones, como crear, editar, eliminar, etc.

// Route::resource('libros', LibroController::class);
// Route::resource('categorias', CategoriasController::class);

route::get('/', function () {return view('welcome');});

// rutas de las categorias

Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
Route::get('/categorias/show/{categorias}', [CategoriasController::class, 'show'])->name('categorias.show');
Route::get('/categorias/edit/{categorias}', [CategoriasController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/update/{categorias}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/delete/{categorias}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');


// rutas de los libros

Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/show/{libro}', [LibroController::class, 'show'])->name('libros.show');
Route::get('/libros/edit/{libro}', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/update/{libro}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/delete/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');
