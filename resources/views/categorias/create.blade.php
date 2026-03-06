<x-app-layout>
<!-- formulario de creación de categorías -->
<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control form-control-custom" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control form-control-custom" id="descripcion" name="descripcion"></textarea>
    </div>
    <!-- aqui se quema el estado -->
    <input type="hidden" name="estado" value="1">

    <button type="submit" class="btn btn-primary">Crear Categoría</button>
</form>

</x-app-layout>