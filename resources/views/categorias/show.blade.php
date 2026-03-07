<x-app-layout>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;900&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<style>
    :root {
        --ink:         #1a1209;
        --paper:       #faf6ef;
        --accent:      #c9723f;
        --muted:       #8b7d6b;
        --line:        #e2d9cc;
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
        margin-bottom: 2.5rem;
    }

    /* ── HEADER BUTTONS ── */
    .btn-ac {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.05em;
        padding: 0.4rem 1rem;
        border-radius: 2px;
        border: 1px solid;
        text-decoration: none;
        transition: background 0.15s, color 0.15s, transform 0.15s;
        white-space: nowrap;
    }
    .btn-ac:hover { transform: translateY(-1px); }
    .btn-volver   { color: var(--muted); border-color: var(--line); background: transparent; }
    .btn-volver:hover { background: var(--ink); color: var(--paper); border-color: var(--ink); }
    .btn-editar   { color: #1a4a7a; border-color: #b8d0e8; background: #edf4fb; }
    .btn-editar:hover { background: #1a4a7a; color: #fff; border-color: #1a4a7a; }

    /* ── LAYOUT ── */
    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
        align-items: start;
    }

    @media (max-width: 768px) {
        .detail-grid { grid-template-columns: 1fr; }
    }

    /* ── BOOK SHELF ILLUSTRATION ── */
    .shelf-wrap {
        background: var(--ink);
        border-radius: 6px;
        padding: 3rem 2rem 2rem;
        position: relative;
        overflow: hidden;
        min-height: 340px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
    }

    /* Grid texture */
    .shelf-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 29px, rgba(255,255,255,0.03) 29px, rgba(255,255,255,0.03) 30px),
            repeating-linear-gradient(90deg, transparent, transparent 29px, rgba(255,255,255,0.03) 29px, rgba(255,255,255,0.03) 30px);
        pointer-events: none;
    }

    .shelf-label {
        position: absolute;
        top: 1.25rem;
        left: 1.5rem;
        font-size: 0.62rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: rgba(250,246,239,0.25);
        font-family: 'DM Sans', sans-serif;
    }

    /* Books row */
    .books-row {
        display: flex;
        align-items: flex-end;
        gap: 6px;
        position: relative;
        z-index: 2;
        padding-bottom: 0.5rem;
    }

    .book-item {
        border-radius: 2px 5px 5px 2px;
        position: relative;
        box-shadow: -3px 3px 10px rgba(0,0,0,0.5), inset -4px 0 8px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s;
        cursor: default;
    }

    .book-item:hover {
        transform: translateY(-10px);
    }

    .book-spine {
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 10px;
        background: rgba(0,0,0,0.25);
        border-radius: 2px 0 0 2px;
    }

    .book-title-spine {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        transform: rotate(180deg);
        font-family: 'Playfair Display', serif;
        font-size: 0.6rem;
        font-weight: 600;
        color: rgba(255,255,255,0.7);
        letter-spacing: 0.05em;
        padding: 0 4px;
        overflow: hidden;
        max-height: 80%;
    }

    /* Shelf plank */
    .shelf-plank {
        width: 100%;
        height: 12px;
        background: linear-gradient(180deg, #3a2a18, #2a1e10);
        border-radius: 2px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.5);
        position: relative;
        z-index: 3;
        margin-top: 0.25rem;
    }

    /* Floating badge */
    .cat-badge-float {
        position: absolute;
        top: 1.25rem;
        right: 1.5rem;
        z-index: 4;
    }

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

    /* ── INFO CARD ── */
    .info-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        padding: 2rem 2rem;
    }

    .info-row {
        padding: 1.1rem 0;
        border-bottom: 1px solid var(--line);
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }
    .info-row:last-child { border-bottom: none; padding-bottom: 0; }
    .info-row:first-child { padding-top: 0; }

    .info-key {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
    }

    .info-val {
        font-family: 'Playfair Display', serif;
        font-size: 1.15rem;
        font-weight: 600;
        color: var(--ink);
        line-height: 1.4;
    }

    .info-val-body {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        color: var(--ink);
        line-height: 1.65;
    }
</style>


<div class="container py-5" style="max-width:1100px;">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Categorías</p>
            <h1 class="page-title">Detalles de la categoría</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('categorias.index') }}" class="btn-ac btn-volver">← Volver</a>
            <a href="{{ route('categorias.edit', $categorias) }}" class="btn-ac btn-editar">Editar</a>
        </div>
    </div>

    {{-- Content grid --}}
    <div class="detail-grid">

        {{-- Book shelf illustration --}}
        <div class="shelf-wrap">
            <span class="shelf-label">{{ $categorias->nombre }}</span>

            <div class="cat-badge-float">
                @if($categorias->estado)
                    <span class="badge-estado badge-activo">Activo</span>
                @else
                    <span class="badge-estado badge-inactivo">Inactivo</span>
                @endif
            </div>

            {{-- Books generated via JS --}}
            <div class="books-row" id="booksRow"></div>
            <div class="shelf-plank"></div>
        </div>

        {{-- Info card --}}
        <div class="info-card">
            <div class="info-row">
                <span class="info-key">Nombre</span>
                <span class="info-val">{{ $categorias->nombre }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Descripción</span>
                <p class="info-val-body mb-0">{{ $categorias->descripcion ?? '—' }}</p>
            </div>
            <div class="info-row">
                <span class="info-key">Color</span>
                <span class="info-val">
                    @if($categorias->color)
                        <span style="display:inline-block;width:16px;height:16px;border:1px solid #ccc;background:{{ $categorias->color }};vertical-align:middle;margin-right:4px"></span>
                        {{ $categorias->color }}
                    @else
                        —
                    @endif
                </span>
            </div>
            <div class="info-row">
                <span class="info-key">Icono</span>
                <span class="info-val">{{ $categorias->icono ?? '—' }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Estado</span>
                <span>
                    @if($categorias->estado)
                        <span class="badge-estado badge-activo">Activo</span>
                    @else
                        <span class="badge-estado badge-inactivo">Inactivo</span>
                    @endif
                </span>
            </div>
        </div>

    </div>
</div>

<script>
    // Genera libros con colores derivados del nombre de la categoría
    (function () {
        const nombre = @json($categorias->nombre);

        // Paletas por tema
        const palettes = {
            drama:    ['#8b2e2e','#c0392b','#7b241c','#a93226','#641e16','#b03a2e'],
            romance:  ['#c9487a','#e91e8c','#a93266','#d63477','#8e44ad','#b7588e'],
            aventura: ['#1a5276','#2980b9','#1f618d','#2471a3','#154360','#1a6b8a'],
            terror:   ['#212121','#424242','#616161','#1b1b1b','#2d2d2d','#4a148c'],
            ciencia:  ['#0d47a1','#1565c0','#283593','#1a237e','#4527a0','#006064'],
            comedia:  ['#f39c12','#e67e22','#d35400','#ca6f1e','#f0a500','#e8820c'],
            default:  ['#5d4037','#795548','#6d4c41','#4e342e','#3e2723','#8d6e63'],
        };

        const key = Object.keys(palettes).find(k => nombre.toLowerCase().includes(k)) || 'default';
        const colors = palettes[key];

        const books = [
            { w: 38, h: 200 },
            { w: 44, h: 170 },
            { w: 36, h: 215 },
            { w: 50, h: 185 },
            { w: 34, h: 195 },
            { w: 46, h: 160 },
            { w: 40, h: 205 },
            { w: 38, h: 175 },
            { w: 48, h: 190 },
        ];

        const row = document.getElementById('booksRow');

        books.forEach((b, i) => {
            const div = document.createElement('div');
            div.className = 'book-item';
            div.style.cssText = `width:${b.w}px; height:${b.h}px; background:${colors[i % colors.length]};`;

            const spine = document.createElement('div');
            spine.className = 'book-spine';

            const title = document.createElement('span');
            title.className = 'book-title-spine';
            title.textContent = nombre;

            div.appendChild(spine);
            div.appendChild(title);
            row.appendChild(div);
        });
    })();
</script>

</x-app-layout>