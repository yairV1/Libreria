<x-app-layout>

<!-- formulario de creación de categorías -->
<form action="{{ route('libros.update', $libro) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Titulo</label>
        <input type="text" class="form-control form-control-custom" id="nombre" name="titulo" value="{{$libro->titulo}}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Autor</label>
        <input type="text" class="form-control form-control-custom" id="descripcion" name="autor" value="{{$libro->autor}}" required>
    </div>
    <div class="mb-3">
        <label for="anio_publicacion" class="form-label">Año de Publicacion</label>
        <input type="date" class="form-control form-control-custom" id="anio_publicacion" name="anio_publicacion" value="{{$libro->anio_publicacion}}" required>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control form-control-custom" id="isbn" name="isbn" value="{{$libro->isbn}}" required> 
    </div>
    <div class="mb-3">
        <select name="categoria_id" id="" class="form-control form-control-custom" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
        <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible" value="{{$libro->cantidad_disponible}}" required>
    </div>
        
    <button type="submit" class="btn btn-primary">Actualizar Libro</button>
</form>

</x-app-layout>