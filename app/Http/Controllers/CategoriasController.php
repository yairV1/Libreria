<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categorias::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required|boolean',
        ]);

        categorias::create($request->all());

        return redirect('/categorias')->with('success', 'Categoria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(categorias $categorias)
    {
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorias $categorias)
    {
        return view('categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorias $categorias)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'estado' => 'required|boolean',
        ]);

        $categorias->update($request->all());

        return redirect('/categorias')->with('success', 'Categoria actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorias $categorias)
    {
        $categorias->delete();

        return redirect('/categorias')->with('success', 'Categoria eliminada exitosamente.');
    }
}
