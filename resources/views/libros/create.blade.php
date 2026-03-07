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

    /* ── LAYOUT ── */
    .create-outer {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 2rem;
        align-items: start;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }
    .form-grid .full { grid-column: 1 / -1; }

    @media (max-width: 900px) {
        .create-outer { grid-template-columns: 1fr; }
        .side-panel    { display: none; }
    }
    @media (max-width: 600px) {
        .form-grid { grid-template-columns: 1fr; }
        .form-grid .full { grid-column: 1; }
    }

    /* ── FORM CARD ── */
    .form-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        padding: 2.5rem;
    }

    /* ── SECTION LABEL ── */
    .section-sep {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--accent);
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--line);
        margin-bottom: 0.25rem;
        grid-column: 1 / -1;
    }

    /* ── LABELS ── */
    .form-label-custom {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.5rem;
        display: block;
    }

    /* ── INPUTS ── */
    .input-custom,
    .select-custom {
        width: 100%;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        color: var(--ink);
        background: var(--paper);
        border: 1px solid var(--line);
        border-radius: 3px;
        padding: 0.75rem 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
        appearance: none;
        -webkit-appearance: none;
    }
    .input-custom:focus,
    .select-custom:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(201,114,63,0.12);
        background: #fff;
    }

    /* Select arrow */
    .select-wrapper { position: relative; }
    .select-wrapper::after {
        content: '';
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        width: 0; height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid var(--muted);
        pointer-events: none;
    }

    /* Quitar flechas number */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; }
    input[type=number] { -moz-appearance: textfield; }

    /* ── ERROR ── */
    .field-error {
        font-size: 0.78rem;
        color: #9b2c2c;
        margin-top: 0.35rem;
    }

    /* ── DIVIDER ── */
    .form-divider {
        border: none;
        border-top: 1px solid var(--line);
        margin: 1.75rem 0 1.5rem;
        grid-column: 1 / -1;
    }

    /* ── BUTTONS ── */
    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--ink);
        color: var(--paper);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.8rem 2rem;
        border-radius: 2px;
        border: none;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s;
    }
    .btn-submit:hover {
        background: var(--accent);
        transform: translateY(-1px);
    }
    .btn-cancelar {
        display: inline-flex;
        align-items: center;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--muted);
        text-decoration: none;
        padding: 0.8rem 1.5rem;
        border: 1px solid var(--line);
        border-radius: 2px;
        transition: color 0.2s, border-color 0.2s;
    }
    .btn-cancelar:hover { color: var(--ink); border-color: var(--ink); }

    /* ── SIDE PANEL ── */
    .side-panel {
        position: sticky;
        top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .side-card {
        background: var(--ink);
        border-radius: 4px;
        padding: 1.75rem;
        color: rgba(250,246,239,0.5);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.83rem;
        line-height: 1.65;
    }

    .side-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--paper);
        margin-bottom: 1.1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #2e2416;
    }

    .hint-item {
        display: flex;
        flex-direction: column;
        gap: 0.15rem;
        margin-bottom: 0.9rem;
    }
    .hint-item:last-child { margin-bottom: 0; }

    .hint-key {
        font-size: 0.63rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--accent);
    }

    /* Mini book preview */
    .book-preview {
        background: linear-gradient(135deg, #c9723f, #8b4513);
        border-radius: 2px 6px 6px 2px;
        padding: 1.5rem 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: -3px 3px 12px rgba(0,0,0,0.4);
        position: relative;
        min-height: 100px;
    }
    .book-preview::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 10px;
        background: rgba(0,0,0,0.25);
        border-radius: 2px 0 0 2px;
    }
    .book-preview-text {
        font-family: 'Playfair Display', serif;
        font-size: 0.78rem;
        font-weight: 600;
        color: rgba(255,255,255,0.85);
        text-align: center;
        line-height: 1.4;
        padding-left: 0.5rem;
    }
    .book-preview-sub {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.65rem;
        color: rgba(255,255,255,0.5);
        text-align: center;
        margin-top: 0.3rem;
        padding-left: 0.5rem;
    }
</style>


<div class="container py-5" style="max-width: 1100px;">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Libros</p>
            <h1 class="page-title">Nuevo libro</h1>
        </div>
        <a href="{{ route('libros.index') }}" class="btn-cancelar">← Volver</a>
    </div>

    <div class="create-outer">

        {{-- Form --}}
        <div class="form-card">
            <form action="{{ route('libros.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    {{-- Sección: Información general --}}
                    <p class="section-sep">Información general</p>

                    {{-- Título --}}
                    <div class="full">
                        <label for="titulo" class="form-label-custom">Título</label>
                        <input type="text" id="titulo" name="titulo" class="input-custom"
                               value="{{ old('titulo') }}"
                               placeholder="Título del libro" required>
                        @error('titulo') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Autor --}}
                    <div>
                        <label for="autor" class="form-label-custom">Autor</label>
                        <input type="text" id="autor" name="autor" class="input-custom"
                               value="{{ old('autor') }}"
                               placeholder="Nombre del autor" required>
                        @error('autor') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Año --}}
                    <div>
                        <label for="anio_publicacion" class="form-label-custom">Año de publicación</label>
                        <input type="date" id="anio_publicacion" name="anio_publicacion" class="input-custom"
                               value="{{ old('anio_publicacion') }}" required>
                        @error('anio_publicacion') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Sección: Detalles --}}
                    <p class="section-sep">Detalles</p>

                    {{-- ISBN --}}
                    <div>
                        <label for="isbn" class="form-label-custom">ISBN</label>
                        <input type="text" id="isbn" name="isbn" class="input-custom"
                               value="{{ old('isbn') }}"
                               placeholder="ej. 978-3-16-148410-0" required>
                        @error('isbn') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Editorial --}}
                    <div>
                        <label for="editorial" class="form-label-custom">Editorial</label>
                        <input type="text" id="editorial" name="editorial" class="input-custom"
                               value="{{ old('editorial') }}"
                               placeholder="Nombre de la editorial">
                        @error('editorial') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Número de páginas --}}
                    <div>
                        <label for="numero_paginas" class="form-label-custom">Número de páginas</label>
                        <input type="number" id="numero_paginas" name="numero_paginas" class="input-custom"
                               value="{{ old('numero_paginas') }}"
                               min="1" placeholder="--">
                        @error('numero_paginas') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Portada (URL) --}}
                    <div class="full">
                        <label for="portada" class="form-label-custom">URL de portada</label>
                        <input type="url" id="portada" name="portada" class="input-custom"
                               value="{{ old('portada') }}"
                               placeholder="https://ejemplo.com/portada.jpg">
                        @error('portada') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Sinopsis --}}
                    <div class="full">
                        <label for="sinopsis" class="form-label-custom">Sinopsis</label>
                        <textarea id="sinopsis" name="sinopsis" class="input-custom" rows="4"
                                  placeholder="Breve descripción del contenido">{{ old('sinopsis') }}</textarea>
                        @error('sinopsis') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Cantidad --}}
                    <div>
                        <label for="cantidad_disponible" class="form-label-custom">Cantidad disponible</label>
                        <input type="number" id="cantidad_disponible" name="cantidad_disponible" class="input-custom"
                               value="{{ old('cantidad_disponible', 1) }}"
                               min="0" placeholder="0" required>
                        @error('cantidad_disponible') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="full">
                        <label for="categoria_id" class="form-label-custom">Categoría</label>
                        <div class="select-wrapper">
                            <select id="categoria_id" name="categoria_id" class="select-custom" required>
                                <option value="">— Seleccione una categoría —</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('categoria_id') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Actions --}}
                    <hr class="form-divider">
                    <div class="full d-flex align-items-center gap-3">
                        <button type="submit" class="btn-submit">+ Crear libro</button>
                        <a href="{{ route('libros.index') }}" class="btn-cancelar">Cancelar</a>
                    </div>

                </div>
            </form>
        </div>

        {{-- Side panel --}}
        <aside class="side-panel">

            {{-- Preview de libro --}}
            <div class="side-card">
                <p class="side-card-title">Vista previa</p>
                <div class="book-preview" id="bookPreview">
                    <div>
                        <p class="book-preview-text" id="previewTitulo">Título del libro</p>
                        <p class="book-preview-sub"  id="previewAutor">Autor</p>
                    </div>
                </div>
            </div>

            {{-- Hints --}}
            <div class="side-card">
                <p class="side-card-title">💡 Consejos</p>
                <div class="hint-item">
                    <span class="hint-key">ISBN</span>
                    <span>Código único de 10 o 13 dígitos. Lo encuentras en la contraportada del libro.</span>
                </div>
                <div class="hint-item">
                    <span class="hint-key">Cantidad</span>
                    <span>Número de ejemplares físicos disponibles para préstamo.</span>
                </div>
                <div class="hint-item">
                    <span class="hint-key">Categoría</span>
                    <span>Si no existe la categoría, créala primero desde el módulo de Categorías.</span>
                </div>
            </div>

        </aside>

    </div>
</div>

{{-- Preview en tiempo real --}}
<script>
    const tituloInput = document.getElementById('titulo');
    const autorInput  = document.getElementById('autor');
    const prevTitulo  = document.getElementById('previewTitulo');
    const prevAutor   = document.getElementById('previewAutor');

    function updatePreview() {
        prevTitulo.textContent = tituloInput.value.trim() || 'Título del libro';
        prevAutor.textContent  = autorInput.value.trim()  || 'Autor';
    }

    tituloInput.addEventListener('input', updatePreview);
    autorInput.addEventListener('input', updatePreview);
</script>

</x-app-layout>