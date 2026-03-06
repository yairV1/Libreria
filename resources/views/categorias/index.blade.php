@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container py-4">
        <h1>Lista de Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary my-4 btn-primary-custom">Crear Categoría</a>
    </div>

    <table class="table table-custom">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>{{ $categoria->estado ? 'Activo' : 'Inactivo' }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-sm btn-secondary btn-secondary-custom">Ver</a>
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-primary btn-primary-custom">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection    
    