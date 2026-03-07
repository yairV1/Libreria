<x-app-layout>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<style>
    :root {
        --ink:         #1a1209;
        --paper:       #faf6ef;
        --accent:      #c9723f;
        --accent-dark: #a35928;
        --muted:       #8b7d6b;
        --line:        #e2d9cc;
    }

    *{
        Scrollbar-width: none;
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

    /* ── TABLE ── */
    .table-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        overflow: hidden;
    }

    .cat-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        font-family: 'DM Sans', sans-serif;
    }

    .cat-table thead tr {
        background: var(--ink);
    }

    .cat-table thead th {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #fff;
        padding: 1rem 1.5rem;
        text-align: left;
        border: none;
    }

    .cat-table thead th.center { text-align: center; }

    .cat-table tbody tr {
        border-bottom: 1px solid var(--line);
        transition: background 0.15s;
    }

    .cat-table tbody tr:last-child { border-bottom: none; }
    .cat-table tbody tr:hover { background: #fdf9f4; }

    .cat-table td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        font-size: 0.88rem;
        color: var(--ink);
        border: none;
    }

    .cat-table td.center { text-align: center; }

    .cat-nombre {
        font-family: 'Playfair Display', serif;
        font-size: 0.95rem;
        font-weight: 600;
    }

    .cat-desc {
        color: var(--muted);
        font-size: 0.85rem;
    }

    /* ── BADGES ── */
    .badge-estado {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.67rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.28rem 0.7rem;
        border-radius: 2px;
        font-family: 'DM Sans', sans-serif;
    }

    .badge-estado::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .badge-activo   { background:#edf7f0; color:#276749; border:1px solid #b7dfc8; }
    .badge-activo::before   { background:#38a169; }

    .badge-inactivo { background:#fdf2f0; color:#9b2c2c; border:1px solid #f5c6be; }
    .badge-inactivo::before { background:#e53e3e; }

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
        padding: 0.32rem 0.8rem;
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
</style>


<div class="container py-5" style="max-width:1100px;">

    {{-- Flash --}}
    @if(session('success'))
        <div class="flash-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Gestión</p>
            <h1 class="page-title">Lista de Categorías</h1>
        </div>
        <a href="{{ route('categorias.create') }}" class="btn-crear">
            + Nueva categoría
        </a>
    </div>

    {{-- Tabla --}}
    <div class="table-card">
        <table class="cat-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="center">Estado</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td><span class="cat-nombre">{{ $categoria->nombre }}</span></td>
                    <td><span class="cat-desc">{{ $categoria->descripcion }}</span></td>
                    <td class="center">
                        @if($categoria->estado)
                            <span class="badge-estado badge-activo">Activo</span>
                        @else
                            <span class="badge-estado badge-inactivo">Inactivo</span>
                        @endif
                    </td>
                    <td class="center">
                        <div class="acciones">
                            <a href="{{ route('categorias.show', $categoria) }}" class="btn-ac btn-ver">Ver</a>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn-ac btn-editar">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-ac btn-eliminar">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

</x-app-layout>