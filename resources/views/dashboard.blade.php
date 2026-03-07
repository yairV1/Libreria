<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;900&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<style>
    :root {
        --ink:    #1a1209;
        --paper:  #faf6ef;
        --accent: #c9723f;
        --muted:  #8b7d6b;
        --line:   #e2d9cc;
    }

    body { background-color: var(--paper) !important; }

    /* ── WELCOME BANNER ── */
    .welcome-banner {
        background: var(--ink);
        border-radius: 6px;
        padding: 2.5rem 3rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .welcome-banner::before {
        content: '📚';
        position: absolute;
        font-size: 14rem;
        right: -1rem;
        top: -2rem;
        opacity: 0.05;
        pointer-events: none;
        line-height: 1;
    }

    /* Grid texture */
    .welcome-banner::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 29px, rgba(255,255,255,0.02) 29px, rgba(255,255,255,0.02) 30px),
            repeating-linear-gradient(90deg, transparent, transparent 29px, rgba(255,255,255,0.02) 29px, rgba(255,255,255,0.02) 30px);
        pointer-events: none;
    }

    .welcome-eyebrow {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 0.5rem;
        font-family: 'DM Sans', sans-serif;
        position: relative;
        z-index: 2;
    }

    .welcome-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.6rem, 3vw, 2.4rem);
        font-weight: 700;
        color: var(--paper);
        margin: 0 0 0.5rem;
        position: relative;
        z-index: 2;
        letter-spacing: -0.02em;
    }

    .welcome-title em {
        font-style: italic;
        color: var(--accent);
    }

    .welcome-sub {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.88rem;
        color: rgba(250,246,239,0.45);
        position: relative;
        z-index: 2;
    }

    /* ── STATS GRID ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) { .stats-grid { grid-template-columns: 1fr; } }
    @media (min-width: 769px) and (max-width: 1024px) { .stats-grid { grid-template-columns: 1fr 1fr; } }

    .stat-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        padding: 1.75rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
        text-decoration: none;
    }

    .stat-card:hover {
        border-color: var(--accent);
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(201,114,63,0.1);
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .icon-books  { background: #f3ece3; }
    .icon-cats   { background: #edf4fb; }
    .icon-active { background: #edf7f0; }

    .stat-info { flex: 1; }

    .stat-num {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--ink);
        line-height: 1;
        margin-bottom: 0.2rem;
    }

    .stat-label {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
    }

    /* ── BOTTOM GRID ── */
    .bottom-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    @media (max-width: 768px) { .bottom-grid { grid-template-columns: 1fr; } }

    /* ── SECTION CARD ── */
    .section-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        overflow: hidden;
    }

    .section-head {
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid var(--line);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .section-head-title {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--muted);
        margin: 0;
    }

    .section-link {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--accent);
        text-decoration: none;
        transition: color 0.15s;
    }
    .section-link:hover { color: var(--ink); }

    /* ── QUICK ACCESS ── */
    .quick-list {
        padding: 0.5rem 0;
    }

    .quick-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.85rem 1.5rem;
        border-bottom: 1px solid var(--line);
        text-decoration: none;
        transition: background 0.15s;
    }
    .quick-item:last-child { border-bottom: none; }
    .quick-item:hover { background: #fdf9f4; }

    .quick-icon {
        width: 36px;
        height: 36px;
        border-radius: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .quick-label {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.88rem;
        font-weight: 500;
        color: var(--ink);
        flex: 1;
    }

    .quick-arrow {
        color: var(--line);
        font-size: 0.8rem;
        transition: color 0.15s, transform 0.15s;
    }
    .quick-item:hover .quick-arrow {
        color: var(--accent);
        transform: translateX(3px);
    }

    /* ── RECENT TABLE ── */
    .recent-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'DM Sans', sans-serif;
    }

    .recent-table td {
        padding: 0.8rem 1.5rem;
        font-size: 0.85rem;
        border-bottom: 1px solid var(--line);
        color: var(--ink);
        vertical-align: middle;
    }

    .recent-table tr:last-child td { border-bottom: none; }
    .recent-table tr:hover td { background: #fdf9f4; }

    .recent-titulo {
        font-family: 'Playfair Display', serif;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--ink);
    }

    .recent-meta {
        font-size: 0.78rem;
        color: var(--muted);
    }

    .cat-pill {
        display: inline-block;
        font-size: 0.63rem;
        font-weight: 500;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.18rem 0.55rem;
        border-radius: 2px;
        background: #f3ece3;
        color: var(--accent);
        border: 1px solid #e8d9c8;
        white-space: nowrap;
    }

    .qty-dot {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.78rem;
        color: var(--muted);
    }
    .qty-dot::before {
        content: '';
        width: 6px; height: 6px;
        border-radius: 50%;
    }
    .dot-ok::before   { background: #38a169; }
    .dot-low::before  { background: #f59e0b; }
    .dot-zero::before { background: #e53e3e; }

    /* Empty state */
    .empty-mini {
        text-align: center;
        padding: 2.5rem 1rem;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.85rem;
    }
</style>


<div class="py-8">
<div class="container" style="max-width: 1100px;">

    {{-- Welcome banner --}}
    <div class="welcome-banner">
        <p class="welcome-eyebrow">Bienvenido</p>
        <h1 class="welcome-title">
            Hola, <em>{{ Auth::user()->name }}</em>
        </h1>
        <p class="welcome-sub">Sistema de Gestión de Biblioteca · {{ now()->isoFormat('dddd D [de] MMMM, YYYY') }}</p>
    </div>

    {{-- Stats --}}
    <div class="stats-grid">
        <a href="{{ route('libros.index') }}" class="stat-card">
            <div class="stat-icon icon-books">📚</div>
            <div class="stat-info">
                <div class="stat-num">{{ $totalLibros ?? \App\Models\Libro::count() }}</div>
                <div class="stat-label">Libros registrados</div>
            </div>
        </a>

        <a href="{{ route('categorias.index') }}" class="stat-card">
            <div class="stat-icon icon-cats">🗂️</div>
            <div class="stat-info">
                <div class="stat-num">{{ $totalCategorias ?? \App\Models\Categorias::count() }}</div>
                <div class="stat-label">Categorías</div>
            </div>
        </a>

        <a href="{{ route('categorias.index') }}" class="stat-card">
            <div class="stat-icon icon-active">✅</div>
            <div class="stat-info">
                <div class="stat-num">{{ $catActivas ?? \App\Models\Categorias::where('estado', 1)->count() }}</div>
                <div class="stat-label">Categorías activas</div>
            </div>
        </a>
    </div>

    {{-- Bottom grid --}}
    <div class="bottom-grid">

        {{-- Accesos rápidos --}}
        <div class="section-card">
            <div class="section-head">
                <p class="section-head-title">Accesos rápidos</p>
            </div>
            <div class="quick-list">
                <a href="{{ route('libros.create') }}" class="quick-item">
                    <div class="quick-icon" style="background:#f3ece3;">➕</div>
                    <span class="quick-label">Agregar nuevo libro</span>
                    <span class="quick-arrow">›</span>
                </a>
                <a href="{{ route('categorias.create') }}" class="quick-item">
                    <div class="quick-icon" style="background:#edf4fb;">🗂️</div>
                    <span class="quick-label">Crear nueva categoría</span>
                    <span class="quick-arrow">›</span>
                </a>
                <a href="{{ route('libros.index') }}" class="quick-item">
                    <div class="quick-icon" style="background:#edf7f0;">📖</div>
                    <span class="quick-label">Ver todos los libros</span>
                    <span class="quick-arrow">›</span>
                </a>
                <a href="{{ route('categorias.index') }}" class="quick-item">
                    <div class="quick-icon" style="background:#fdf2f0;">🏷️</div>
                    <span class="quick-label">Ver todas las categorías</span>
                    <span class="quick-arrow">›</span>
                </a>
            </div>
        </div>

        {{-- Últimos libros --}}
        <div class="section-card">
            <div class="section-head">
                <p class="section-head-title">Últimos libros agregados</p>
                <a href="{{ route('libros.index') }}" class="section-link">Ver todos →</a>
            </div>
            @php
                $recientes = \App\Models\Libro::with('categoria')->latest()->take(5)->get();
            @endphp
            @if($recientes->isEmpty())
                <div class="empty-mini">No hay libros registrados aún.</div>
            @else
                <table class="recent-table">
                    @foreach($recientes as $libro)
                    <tr>
                        <td>
                            <div class="recent-titulo">{{ $libro->titulo }}</div>
                            <div class="recent-meta">{{ $libro->autor }}</div>
                        </td>
                        <td><span class="cat-pill">{{ $libro->categoria->nombre }}</span></td>
                        <td>
                            @php $q = $libro->cantidad_disponible ?? 0; @endphp
                            <span class="qty-dot {{ $q == 0 ? 'dot-zero' : ($q <= 3 ? 'dot-low' : 'dot-ok') }}">
                                {{ $q }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            @endif
        </div>

    </div>

</div>
</div>

</x-app-layout>