<x-app-layout>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<style>
    :root {
        --ink:         #1a1209;
        --paper:       #faf6ef;
        --accent:      #c9723f;
        --muted:       #8b7d6b;
        --line:        #e2d9cc;
    }

    *{
        scrollbar-width: none;
    }

    body { background-color: var(--paper) !important; }

    /* ── HEADER ── */
    .page-eyebrow {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 0.35rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }
    .page-eyebrow::before {
        content: '';
        display: block;
        width: 24px;
        height: 1px;
        background: var(--accent);
    }
    .page-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: var(--ink);
        margin: 0;
    }
    .page-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--line);
        margin-bottom: 2rem;
    }

    /* ── FLASH ── */
    .flash-success {
        background: #edf7f0;
        border: 1px solid #b7dfc8;
        color: #276749;
        font-size: 0.85rem;
        font-family: 'DM Sans', sans-serif;
        padding: 0.85rem 1.25rem;
        border-radius: 3px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* ── BTN CREAR ── */
    .btn-crear {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        background: var(--ink);
        color: var(--paper) !important;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.72rem 1.5rem;
        border-radius: 2px;
        text-decoration: none;
        border: none;
        transition: background 0.2s, transform 0.15s;
        white-space: nowrap;
    }
    .btn-crear:hover {
        background: var(--accent);
        color: #fff !important;
        transform: translateY(-1px);
    }

    /* ── TABLE ── */
    .table-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        overflow: hidden;
    }

    .lib-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        font-family: 'DM Sans', sans-serif;
    }

    .lib-table thead tr { background: var(--ink); }

    .lib-table thead th {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--muted);
        padding: 1rem 1.25rem;
        text-align: left;
        border: none;
        white-space: nowrap;
    }
    .lib-table thead th.center { text-align: center; }

    .lib-table tbody tr {
        border-bottom: 1px solid var(--line);
        transition: background 0.15s;
    }
    .lib-table tbody tr:last-child { border-bottom: none; }
    .lib-table tbody tr:hover { background: #fdf9f4; }

    .lib-table td {
        padding: 0.9rem 1.25rem;
        vertical-align: middle;
        font-size: 0.88rem;
        color: var(--ink);
        border: none;
    }
    .lib-table td.center { text-align: center; }

    /* Título en Playfair */
    .lib-titulo {
        font-family: 'Playfair Display', serif;
        font-size: 0.93rem;
        font-weight: 600;
        color: var(--ink);
    }

    /* Datos secundarios */
    .lib-autor  { color: var(--ink); }
    .lib-meta   { color: var(--muted); font-size: 0.82rem; }

    /* Categoría pill */
    .cat-pill {
        display: inline-block;
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.22rem 0.65rem;
        border-radius: 2px;
        background: #f3ece3;
        color: var(--accent);
        border: 1px solid #e8d9c8;
        white-space: nowrap;
    }

    /* Cantidad badge */
    .qty-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 28px;
        height: 28px;
        border-radius: 2px;
        font-size: 0.78rem;
        font-weight: 600;
        font-family: 'DM Sans', sans-serif;
    }
    .qty-ok   { background: #edf7f0; color: #276749; border: 1px solid #b7dfc8; }
    .qty-low  { background: #fdf2f0; color: #9b2c2c; border: 1px solid #f5c6be; }
    .qty-zero { background: #f3f3f3; color: #999;    border: 1px solid #ddd; }

    /* ── ACTION BUTTONS ── */
    .acciones {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
    }

    .btn-ac {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.05em;
        padding: 0.3rem 0.75rem;
        border-radius: 2px;
        border: 1px solid;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.15s, color 0.15s, transform 0.15s;
        white-space: nowrap;
        background: transparent;
        line-height: 1.6;
    }
    .btn-ac:hover { transform: translateY(-1px); }

    .btn-ver      { color: var(--muted); border-color: var(--line); }
    .btn-ver:hover { background: var(--ink); color: var(--paper); border-color: var(--ink); }

    .btn-editar   { color: #1a4a7a; border-color: #b8d0e8; background: #edf4fb; }
    .btn-editar:hover { background: #1a4a7a; color: #fff; border-color: #1a4a7a; }

    .btn-eliminar { color: #9b2c2c; border-color: #f5c6be; background: #fdf2f0; }
    .btn-eliminar:hover { background: #9b2c2c; color: #fff; border-color: #9b2c2c; }

    /* ── EMPTY STATE ── */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
    }
    .empty-icon { font-size: 2.5rem; margin-bottom: 0.75rem; opacity: 0.4; }
    .empty-state p { font-size: 0.9rem; }
</style>


<div class="container py-5" style="max-width:1200px;">

    {{-- Flash --}}
    @if(session('success'))
        <div class="flash-success">✓ {{ session('success') }}</div>
    @endif

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Gestión</p>
            <h1 class="page-title">Lista de Libros</h1>
        </div>
        <a href="{{ route('libros.create') }}" class="btn-crear">+ Nuevo libro</a>
    </div>

    {{-- Tabla --}}
    <div class="table-card">
        <table class="lib-table">
            <thead>
                <tr>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Año</th>
                    <th>ISBN</th>
                    <th>Categoría</th>
                    <th class="center">Cantidad</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($libros as $libro)
                <tr>
                    <td>
                        @if($libro->portada)
                            <img src="{{ $libro->portada }}" alt="{{ $libro->titulo }}" style="height:40px;" />
                        @endif
                    </td>
                    <td><span class="lib-titulo">{{ $libro->titulo }}</span></td>
                    <td><span class="lib-autor">{{ $libro->autor }}</span></td>
                    <td><span class="lib-meta">{{ $libro->editorial }}</span></td>
                    <td><span class="lib-meta">{{ $libro->anio_publicacion }}</span></td>
                    <td><span class="lib-meta">{{ $libro->isbn }}</span></td>
                    <td><span class="cat-pill">{{ $libro->categoria->nombre }}</span></td>
                    <td class="center">
                        @php $qty = $libro->cantidad_disponible; @endphp
                        <span class="qty-badge {{ $qty == 0 ? 'qty-zero' : ($qty <= 3 ? 'qty-low' : 'qty-ok') }}">
                            {{ $qty }}
                        </span>
                    </td>
                    <td class="center">
                        <div class="acciones">
                            <a href="{{ route('libros.show', $libro) }}" class="btn-ac btn-ver">Ver</a>
                            <a href="{{ route('libros.edit', $libro) }}" class="btn-ac btn-editar">Editar</a>
                            <form action="{{ route('libros.destroy', $libro) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar este libro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-ac btn-eliminar">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">
                        <div class="empty-state">
                            <div class="empty-icon">📚</div>
                            <p>No hay libros registrados aún.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- paginación para rendimiento --}}
    <div class="mt-4">
        {{ $libros->links() }}
    </div>

</div>

</x-app-layout>