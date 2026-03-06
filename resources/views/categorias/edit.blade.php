@extends('layouts.app')
@section('content')

<!-- formulario de creación de categorías -->
<form action="{{ route('categorias.update', $categorias) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control form-control-custom" id="nombre" name="nombre" value="{{ $categorias->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control form-control-custom" id="descripcion" name="descripcion">{{ $categorias->descripcion }}</textarea>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-control" id="estado" name="estado">
            <option value="1" {{ $categorias->estado ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ !$categorias->estado ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
</form>

@endsection