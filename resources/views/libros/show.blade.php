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
        background: transparent;
    }
    .btn-ac:hover { transform: translateY(-1px); }
    .btn-volver   { color: var(--muted); border-color: var(--line); }
    .btn-volver:hover { background: var(--ink); color: var(--paper); border-color: var(--ink); }
    .btn-editar   { color: #1a4a7a; border-color: #b8d0e8; background: #edf4fb; }
    .btn-editar:hover { background: #1a4a7a; color: #fff; border-color: #1a4a7a; }

    /* ── LAYOUT ── */
    .detail-grid {
        display: grid;
        grid-template-columns: 420px 1fr;
        gap: 2.5rem;
        align-items: start;
    }
    @media (max-width: 860px) {
        .detail-grid { grid-template-columns: 1fr; }
    }

    /* ── BOOK COVER ILLUSTRATION ── */
    .book-cover-wrap {
        background: var(--ink);
        border-radius: 6px;
        padding: 3rem 2.5rem;
        position: relative;
        overflow: hidden;
        min-height: 380px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Subtle grid texture */
    .book-cover-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 29px, rgba(255,255,255,0.025) 29px, rgba(255,255,255,0.025) 30px),
            repeating-linear-gradient(90deg, transparent, transparent 29px, rgba(255,255,255,0.025) 29px, rgba(255,255,255,0.025) 30px);
        pointer-events: none;
    }

    /* The book */
    .book-3d {
        position: relative;
        width: 200px;
        height: 280px;
        transform-style: preserve-3d;
        transform: perspective(800px) rotateY(-18deg);
        transition: transform 0.5s ease;
        cursor: pointer;
        z-index: 2;
    }
    .book-3d:hover {
        transform: perspective(800px) rotateY(-6deg) translateY(-6px);
    }

    /* Front cover */
    .book-front {
        position: absolute;
        inset: 0;
        border-radius: 2px 6px 6px 2px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.5rem 1.25rem;
        box-shadow: 6px 6px 30px rgba(0,0,0,0.6);
        overflow: hidden;
    }
    .book-front::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, transparent 60%);
        pointer-events: none;
    }

    /* Spine */
    .book-spine-3d {
        position: absolute;
        left: -18px;
        top: 2px;
        bottom: 2px;
        width: 18px;
        border-radius: 2px 0 0 2px;
        box-shadow: -3px 0 8px rgba(0,0,0,0.4);
    }

    .book-category-tag {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.6rem;
        font-weight: 600;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.6);
        background: rgba(0,0,0,0.2);
        display: inline-block;
        padding: 0.2rem 0.5rem;
        border-radius: 2px;
        align-self: flex-start;
    }

    .book-cover-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 900;
        color: #fff;
        line-height: 1.25;
        text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .book-cover-author {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.72rem;
        font-weight: 400;
        color: rgba(255,255,255,0.65);
        margin-top: 0.4rem;
    }

    /* Decorative lines on cover */
    .book-deco {
        position: absolute;
        left: 1.25rem;
        right: 1.25rem;
        bottom: 3.5rem;
        height: 1px;
        background: rgba(255,255,255,0.15);
    }

    /* Floating qty badge */
    .qty-float {
        position: absolute;
        bottom: 1.25rem;
        right: 1.25rem;
        z-index: 4;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.3rem;
    }

    .qty-badge {
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
    .qty-badge::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .qty-ok   { background:#edf7f0; color:#276749; border:1px solid #b7dfc8; }
    .qty-ok::before   { background:#38a169; }
    .qty-low  { background:#fff3cd; color:#856404; border:1px solid #ffd97d; }
    .qty-low::before  { background:#f59e0b; }
    .qty-zero { background:#fdf2f0; color:#9b2c2c; border:1px solid #f5c6be; }
    .qty-zero::before { background:#e53e3e; }

    /* ── INFO CARD ── */
    .info-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        overflow: hidden;
    }

    .info-row {
        display: grid;
        grid-template-columns: 140px 1fr;
        align-items: baseline;
        padding: 1.1rem 1.75rem;
        border-bottom: 1px solid var(--line);
        gap: 1rem;
    }
    .info-row:last-child { border-bottom: none; }

    .info-key {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
        white-space: nowrap;
    }

    .info-val-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--ink);
        line-height: 1.3;
    }

    .info-val {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.92rem;
        color: var(--ink);
    }

    .info-val-meta {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.88rem;
        color: var(--muted);
    }

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
    }

    @media (max-width: 500px) {
        .info-row { grid-template-columns: 1fr; gap: 0.25rem; }
    }
</style>


<div class="container py-5" style="max-width: 1100px;">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Libros</p>
            <h1 class="page-title">Detalles del libro</h1>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('libros.index') }}"     class="btn-ac btn-volver">← Volver</a>
            <a href="{{ route('libros.edit', $libro) }}" class="btn-ac btn-editar">Editar</a>
        </div>
    </div>

    <div class="detail-grid">

        {{-- Book cover illustration --}}
        <div class="book-cover-wrap">
            <div class="book-3d" id="book3d" title="Haz clic para girar">
                <div class="book-spine-3d" id="bookSpine"></div>
                <div class="book-front" id="bookFront">
                    <span class="book-category-tag">{{ $libro->categoria->nombre }}</span>
                    <div>
                        <div class="book-deco"></div>
                        <p class="book-cover-title">{{ $libro->titulo }}</p>
                        <p class="book-cover-author">{{ $libro->autor }}</p>
                    </div>
                </div>
            </div>

            {{-- Cantidad badge --}}
            <div class="qty-float">
                @php $qty = $libro->cantidad_disponible ?? 0; @endphp
                <span class="qty-badge {{ $qty == 0 ? 'qty-zero' : ($qty <= 3 ? 'qty-low' : 'qty-ok') }}">
                    {{ $qty }} {{ $qty == 1 ? 'ejemplar' : 'ejemplares' }}
                </span>
            </div>
        </div>

        {{-- Info card --}}
        <div class="info-card">
            <div class="info-row">
                <span class="info-key">Título</span>
                <span class="info-val-title">{{ $libro->titulo }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Autor</span>
                <span class="info-val">{{ $libro->autor }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Año</span>
                <span class="info-val-meta">
                    {{ \Carbon\Carbon::parse($libro->anio_publicacion)->format('d/m/Y') }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-key">ISBN</span>
                <span class="info-val-meta" style="font-variant-numeric: tabular-nums; letter-spacing:0.03em;">
                    {{ $libro->isbn }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-key">Categoría</span>
                <span class="cat-pill">{{ $libro->categoria->nombre }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Disponibles</span>
                <span class="qty-badge {{ $qty == 0 ? 'qty-zero' : ($qty <= 3 ? 'qty-low' : 'qty-ok') }}">
                    {{ $qty }} {{ $qty == 1 ? 'ejemplar' : 'ejemplares' }}
                </span>
            </div>
        </div>

    </div>
</div>

<script>
(function () {
    // Paletas por categoría (mismo sistema que categorias/show)
    const palettes = {
        drama:    ['#8b2e2e','#c0392b'],
        romance:  ['#c9487a','#8e44ad'],
        aventura: ['#1a5276','#2980b9'],
        terror:   ['#212121','#4a148c'],
        ciencia:  ['#0d47a1','#4527a0'],
        comedia:  ['#f39c12','#e67e22'],
        default:  ['#5d4037','#795548'],
    };

    const categoria = @json($libro->categoria->nombre ?? '');
    const key = Object.keys(palettes).find(k => categoria.toLowerCase().includes(k)) || 'default';
    const [c1, c2] = palettes[key];

    const front = document.getElementById('bookFront');
    const spine = document.getElementById('bookSpine');

    front.style.background = `linear-gradient(150deg, ${c1}, ${c2})`;
    spine.style.background  = c2;

    // Click to toggle open/closed
    let open = false;
    document.getElementById('book3d').addEventListener('click', () => {
        open = !open;
        document.getElementById('book3d').style.transform = open
            ? 'perspective(800px) rotateY(-35deg) translateY(-6px)'
            : 'perspective(800px) rotateY(-18deg)';
    });
})();
</script>

</x-app-layout>