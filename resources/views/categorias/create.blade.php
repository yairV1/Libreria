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

    /* ── LAYOUT ── */
    .create-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 2.5rem;
        align-items: start;
    }

    @media (max-width: 900px) {
        .create-grid { grid-template-columns: 1fr; }
        .side-hint   { display: none; }
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
    .textarea-custom,
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
    .textarea-custom:focus,
    .select-custom:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(201,114,63,0.12);
        background: #fff;
    }

    .textarea-custom {
        resize: vertical;
        min-height: 110px;
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

    /* ── SIDE HINT ── */
    .side-hint {
        background: var(--ink);
        border-radius: 4px;
        padding: 2rem;
        color: rgba(250,246,239,0.5);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.85rem;
        line-height: 1.65;
        position: sticky;
        top: 2rem;
    }

    .side-hint-title {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        font-weight: 600;
        color: var(--paper);
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #2e2416;
    }

    .hint-row {
        display: flex;
        flex-direction: column;
        gap: 0.2rem;
        margin-bottom: 1.1rem;
    }
    .hint-row:last-child { margin-bottom: 0; }

    .hint-key {
        font-size: 0.65rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--accent);
    }

    .hint-val {
        color: rgba(250,246,239,0.6);
        font-size: 0.82rem;
    }

    /* Estado preview */
    .estado-preview {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .estado-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.25rem 0.6rem;
        border-radius: 2px;
    }
    .estado-chip::before {
        content: '';
        width: 5px; height: 5px;
        border-radius: 50%;
    }
    .chip-activo   { background:#edf7f0; color:#276749; border:1px solid #b7dfc8; }
    .chip-activo::before   { background:#38a169; }
    .chip-inactivo { background:#fdf2f0; color:#9b2c2c; border:1px solid #f5c6be; }
    .chip-inactivo::before { background:#e53e3e; }
</style>


<div class="container py-5" style="max-width:1100px;">

    {{-- Header --}}
    <div class="page-header">
        <div>
            <p class="page-eyebrow">Categorías</p>
            <h1 class="page-title">Nueva categoría</h1>
        </div>
        <a href="{{ route('categorias.index') }}" class="btn-cancelar">← Volver</a>
    </div>

    <div class="create-grid">

        {{-- Form --}}
        <div class="form-card">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf

                {{-- Nombre --}}
                <div class="mb-4">
                    <label for="nombre" class="form-label-custom">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="input-custom"
                        value="{{ old('nombre') }}"
                        placeholder="ej. Ciencia Ficción, Drama, Romance…"
                        required
                    >
                    @error('nombre')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Descripción --}}
                <div class="mb-4">
                    <label for="descripcion" class="form-label-custom">Descripción</label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        class="textarea-custom"
                        placeholder="Describe brevemente esta categoría…"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Estado --}}
                <div class="mb-2">
                    <label for="estado" class="form-label-custom">Estado</label>
                    <div class="select-wrapper">
                        <select id="estado" name="estado" class="select-custom">
                            <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    @error('estado')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Color (para presentación) --}}
                <div class="mb-4">
                    <label for="color" class="form-label-custom">Color</label>
                    <input
                        type="text"
                        id="color"
                        name="color"
                        class="input-custom"
                        value="{{ old('color') }}"
                        placeholder="#aabbcc o nombre de CSS"
                    >
                    @error('color')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Icono --}}
                <div class="mb-4">
                    <label for="icono" class="form-label-custom">Icono</label>
                    <input
                        type="text"
                        id="icono"
                        name="icono"
                        class="input-custom"
                        value="{{ old('icono') }}"
                        placeholder="fa-book, bi-music, etc."
                    >
                    @error('icono')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="form-divider">

                {{-- Actions --}}
                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn-submit">
                        + Crear categoría
                    </button>
                    <a href="{{ route('categorias.index') }}" class="btn-cancelar">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>

        {{-- Side hint --}}
        <aside class="side-hint">
            <p class="side-hint-title">💡 Consejos</p>

            <div class="hint-row">
                <span class="hint-key">Nombre</span>
                <span class="hint-val">Usa un nombre claro y único. Evita duplicar categorías ya existentes.</span>
            </div>

            <div class="hint-row">
                <span class="hint-key">Descripción</span>
                <span class="hint-val">Opcional, pero ayuda a entender qué tipo de libros agrupa esta categoría.</span>
            </div>

            <div class="hint-row">
                <span class="hint-key">Estado</span>
                <span class="hint-val">Solo las categorías activas estarán disponibles al registrar libros.</span>
                <div class="estado-preview">
                    <span class="estado-chip chip-activo">Activo</span>
                    <span class="estado-chip chip-inactivo">Inactivo</span>
                </div>
            </div>
        </aside>

    </div>
</div>

</x-app-layout>