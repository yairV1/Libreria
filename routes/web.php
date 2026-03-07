<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// las rutas que estan para los usuarios autenticados, es decir, para los usuarios que han iniciado sesión

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

// estas son las rutas para el perfil del usuario, es decir, para que el usuario pueda editar su perfil, actualizar su perfil y eliminar su perfil

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
