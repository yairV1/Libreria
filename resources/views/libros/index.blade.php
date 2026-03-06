@extends('layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container py-4">
        <h1>Lista de Libros</h1>
        <a href="{{ route('libros.create') }}" class="btn btn-primary my-4 btn-primary-custom">Crear Libro</a>
    </div>

    <table class="table table-custom">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>ISBN</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->anio_publicacion }}</td>
                <td>{{ $libro->isbn }}</td>
                <td>{{ $libro->categoria->nombre }}</td>
                <td>{{ $libro->cantidad_disponible }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('libros.show', $libro) }}" class="btn btn-sm btn-secondary btn-secondary-custom">Ver</a>
                    <a href="{{ route('libros.edit', $libro) }}" class="btn btn-sm btn-primary btn-primary-custom">Editar</a>
                    <form action="{{ route('libros.destroy', $libro) }}" method="POST" class="d-inline">
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
    