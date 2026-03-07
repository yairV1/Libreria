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
    .edit-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    .edit-grid .full { grid-column: 1 / -1; }

    @media (max-width: 768px) {
        .edit-grid { grid-template-columns: 1fr; }
        .edit-grid .full { grid-column: 1; }
    }

    /* ── FORM CARD ── */
    .form-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        padding: 2.5rem;
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

    /* Number input — quitar flechas */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; }
    input[type=number] { -moz-appearance: textfield; }

    /* ── SECTION TITLE ── */
    .section-sep {
        font-size: 0.68rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--accent);
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--line);
        margin-bottom: 1.5rem;
        grid-column: 1 / -1;
    }

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
        margin: 2rem 0 1.5rem;
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
    .btn-cancelar:hover {
        color: var(--ink);
        border-color: var(--ink);
    }
</style>


<div class="container py-5" style="max-width: 900px;">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Libros</p>
            <h1 class="page-title">Editar libro</h1>
        </div>
        <a href="{{ route('libros.index') }}" class="btn-cancelar">← Volver</a>
    </div>

    <div class="form-card">
        <form action="{{ route('libros.update', $libro) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="edit-grid">

                {{-- Sección: Información general --}}
                <p class="section-sep">Información general</p>

                {{-- Título --}}
                <div class="full">
                    <label for="titulo" class="form-label-custom">Título</label>
                    <input type="text" id="titulo" name="titulo" class="input-custom"
                           value="{{ old('titulo', $libro->titulo) }}"
                           placeholder="Título del libro" required>
                    @error('titulo') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Autor --}}
                <div>
                    <label for="autor" class="form-label-custom">Autor</label>
                    <input type="text" id="autor" name="autor" class="input-custom"
                           value="{{ old('autor', $libro->autor) }}"
                           placeholder="Nombre del autor" required>
                    @error('autor') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Año de publicación --}}
                <div>
                    <label for="anio_publicacion" class="form-label-custom">Año de publicación</label>
                    <input type="date" id="anio_publicacion" name="anio_publicacion" class="input-custom"
                           value="{{ old('anio_publicacion', $libro->anio_publicacion) }}" required>
                    @error('anio_publicacion') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Sección: Detalles --}}
                <p class="section-sep">Detalles</p>

                {{-- ISBN --}}
                <div>
                    <label for="isbn" class="form-label-custom">ISBN</label>
                    <input type="text" id="isbn" name="isbn" class="input-custom"
                           value="{{ old('isbn', $libro->isbn) }}"
                           placeholder="ej. 978-3-16-148410-0" required>
                    @error('isbn') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Editorial --}}
                <div>
                    <label for="editorial" class="form-label-custom">Editorial</label>
                    <input type="text" id="editorial" name="editorial" class="input-custom"
                           value="{{ old('editorial', $libro->editorial) }}"
                           placeholder="Nombre de la editorial">
                    @error('editorial') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Número de páginas --}}
                <div>
                    <label for="numero_paginas" class="form-label-custom">Número de páginas</label>
                    <input type="number" id="numero_paginas" name="numero_paginas" class="input-custom"
                           value="{{ old('numero_paginas', $libro->numero_paginas) }}"
                           min="1" placeholder="--">
                    @error('numero_paginas') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Portada (URL) --}}
                <div class="full">
                    <label for="portada" class="form-label-custom">URL de portada</label>
                    <input type="url" id="portada" name="portada" class="input-custom"
                           value="{{ old('portada', $libro->portada) }}"
                           placeholder="https://ejemplo.com/portada.jpg">
                    @error('portada') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Sinopsis --}}
                <div class="full">
                    <label for="sinopsis" class="form-label-custom">Sinopsis</label>
                    <textarea id="sinopsis" name="sinopsis" class="input-custom" rows="4"
                              placeholder="Breve descripción del contenido">{{ old('sinopsis', $libro->sinopsis) }}</textarea>
                    @error('sinopsis') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                {{-- Cantidad disponible --}}
                <div>
                    <label for="cantidad_disponible" class="form-label-custom">Cantidad disponible</label>
                    <input type="number" id="cantidad_disponible" name="cantidad_disponible" class="input-custom"
                           value="{{ old('cantidad_disponible', $libro->cantidad_disponible) }}"
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
                                    {{ old('categoria_id', $libro->categoria_id) == $categoria->id ? 'selected' : '' }}>
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
                    <button type="submit" class="btn-submit">✓ Actualizar libro</button>
                    <a href="{{ route('libros.index') }}" class="btn-cancelar">Cancelar</a>
                </div>

            </div>
        </form>
    </div>

</div>

</x-app-layout>