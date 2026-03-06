<x-app-layout>

<div class="container">
    <h1>Detalles de la categoría</h1>
    <div class="mt-3 mb-4">
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-sm">Volver a la lista</a>
        <a href="{{ route('categorias.edit', $categorias) }}" class="btn btn-primary btn-sm">Editar categoría</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <img src="https://m.media-amazon.com/images/I/61HYTlq+hVL.jpg" alt="categoria" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <h2>Nombre: {{ $categorias->nombre }}</h2>
        <h3>Descripción: {{ $categorias->descripcion }}</h3>
        <p>Estado: {{ $categorias->estado ? 'Activo' : 'Inactivo' }}</p>
    </div>
</div>

</x-app-layout>