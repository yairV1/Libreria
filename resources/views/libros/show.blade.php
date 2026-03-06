<x-app-layout>

<div class="container">
    <h1>Detalles del libro</h1>
    <div class="mt-3 mb-4">
        <a href="{{ route('libros.index') }}" class="btn btn-secondary btn-sm">Volver a la lista</a>
        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-primary btn-sm">Editar libro</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <img src="" alt="libro" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <h2>Título: {{ $libro->titulo }}</h2>
        <h2>Autor: {{ $libro->autor }}</h2>
        <h2>Año de publicación: {{ $libro->anio_publicacion }}</h2>
        <h2>ISBN: {{ $libro->isbn }}</h2>
        <h2>Categoría: {{ $libro->categoria->nombre }}</h2>
    </div>
</div>

</x-app-layout>