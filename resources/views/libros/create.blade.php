<x-app-layout>
<!-- formulario de creación de categorías -->
<form action="{{ route('libros.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Titulo</label>
        <input type="text" class="form-control form-control-custom" id="nombre" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Autor</label>
        <textarea class="form-control form-control-custom" id="descripcion" name="autor"></textarea>
    </div>
    <div class="mb-3">
        <label for="anio_publicacion" class="form-label">Año de Publicacion</label>
        <input type="date" class="form-control form-control-custom" id="anio_publicacion" name="anio_publicacion" required>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control form-control-custom" id="isbn" name="isbn" required> 
    </div>
    <div class="mb-3">
        <select name="categoria_id" id="" class="form-control form-control-custom" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
        <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible" required>
    </div>
        
    <button type="submit" class="btn btn-primary">Crear Libro</button>
</form>
</x-app-layout>