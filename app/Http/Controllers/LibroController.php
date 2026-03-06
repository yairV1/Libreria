<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    // funcion para mostrar las categorias en el formulario de creación de libros
    public function categorias()
    {
        $categorias = categorias::all();
        return view('libros.create', compact('categorias'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = libro::with('categoria')->get();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categorias::all();
        return view('libros.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|date',
            'isbn' => 'required|unique:libros,isbn',
            'categoria_id' => 'required',
            'cantidad_disponible' => 'required|integer',
        ]);

        libro::create($request->all());

        return redirect('/libros')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libro $libro)
    {
        $categorias = categorias::all();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|date',
            'isbn' => 'required|unique:libros,isbn,' . $libro->id,
            'categoria_id' => 'required',
            'cantidad_disponible' => 'required|integer',
        ]);

        $libro->update($request->all());

        return redirect('/libros')->with('success', 'Libro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libro $libro)
    {
        $libro->delete();

        return redirect('/libros')->with('success', 'Libro eliminado exitosamente.');
    }
}
