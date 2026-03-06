<x-app-layout>

<style>
/* CONTENEDOR */
.container-custom{
    max-width: 1100px;
    margin: auto;
}

/* TITULO */
.titulo{
    font-weight: 700;
    color: #2c3e50;
}

/* TABLA */
.table-custom{
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.table-custom thead{
    background: #0d6efd;
    color: white;
}

.table-custom th{
    padding: 14px;
    text-align: center;
}

.table-custom td{
    padding: 12px;
    vertical-align: middle;
}

/* FILAS */
.table-custom tbody tr:hover{
    background: #f5f8ff;
    transition: 0.2s;
}

/* BOTONES */
.btn-primary-custom{
    background: linear-gradient(135deg,#0d6efd,#4dabff);
    border: none;
}

.btn-primary-custom:hover{
    background: linear-gradient(135deg,#0b5ed7,#339af0);
}

.btn-secondary-custom{
    background: #6c757d;
    border: none;
}

.btn-secondary-custom:hover{
    background: #5c636a;
}

/* ALERTA */
.alert-success{
    max-width: 1100px;
    margin: 20px auto;
    border-radius: 8px;
    text-align: center;
    font-weight: 500;
}

/* BOTONES DE ACCIONES */
.acciones{
    display:flex;
    gap:6px;
    justify-content:center;
}
</style>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container container-custom py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="titulo">Lista de Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-primary-custom">
            + Crear Categoría
        </a>
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
            <td>
                @if($categoria->estado)
                    <span class="badge bg-success">Activo</span>
                @else
                    <span class="badge bg-danger">Inactivo</span>
                @endif
            </td>
            <td class="acciones">
                <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-sm btn-secondary btn-secondary-custom">Ver</a>
                <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-primary btn-primary-custom">Editar</a>

                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

</x-app-layout>