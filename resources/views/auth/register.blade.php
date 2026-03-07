<x-guest-layout>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
        width: 100%; height: 100%;
        background: #0a0704 !important;
        font-family: 'DM Sans', sans-serif;
        overflow: hidden;
    }

    /* ── FOTO FONDO ── */
    .bg-photo {
        position: fixed;
        inset: 0;
        z-index: 0;
        background:
            url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1600&q=85&fit=crop')
            center center / cover no-repeat;
    }
    .bg-photo::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to right,
            rgba(5,3,1,0.80) 0%,
            rgba(5,3,1,0.45) 45%,
            rgba(5,3,1,0.70) 100%
        );
    }

    /* ── PÁGINA: 2 COLUMNAS ── */
    .page {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 100vh;
        display: grid;
        grid-template-columns: 1fr 460px;
        align-items: center;
    }

    /* ── COLUMNA IZQUIERDA: tagline ── */
    .col-left {
        padding: 4rem clamp(2rem, 5vw, 5rem);
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        text-decoration: none;
        margin-bottom: auto;
        padding-top: 0.5rem;
    }
    .brand-text {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        font-weight: 700;
        color: #fff;
    }

    .tagline {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .tagline-eye {
        font-size: 0.62rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: #c9723f;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .tagline-eye::before {
        content: '';
        width: 20px; height: 1px;
        background: #c9723f;
        display: block;
        flex-shrink: 0;
    }

    .tagline-h {
        font-family: 'Playfair Display', serif;
        font-size: clamp(3rem, 5vw, 4.5rem);
        font-weight: 900;
        line-height: 1.0;
        letter-spacing: -0.03em;
        color: #fff;
        margin-bottom: 1.25rem;
        text-shadow: 0 2px 20px rgba(0,0,0,0.4);
    }
    .tagline-h em { font-style: italic; color: #c9723f; }

    .tagline-sub {
        font-size: 0.85rem;
        font-weight: 300;
        color: rgba(255,255,255,0.38);
        line-height: 1.75;
    }

    .col-footer {
        font-size: 0.62rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.15);
        margin-top: auto;
        padding-bottom: 0.5rem;
    }

    /* ── COLUMNA DERECHA: card ── */
    .col-right {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 3rem;
        border-left: 1px solid rgba(255,255,255,0.06);
        background: rgba(6, 4, 2, 0.55);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
    }

    .card {
        width: 100%;
        max-width: 360px;
    }

    .card-eye {
        font-size: 0.62rem;
        font-weight: 500;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: #c9723f;
        margin-bottom: 0.5rem;
    }

    .card-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #fff;
        line-height: 1.1;
        margin-bottom: 0.35rem;
    }
    .card-title em { font-style: italic; color: #c9723f; }

    .card-sub {
        font-size: 0.8rem;
        font-weight: 300;
        color: rgba(255,255,255,0.3);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    /* Flash */
    .flash {
        border-left: 2px solid #48bb78;
        background: rgba(72,187,120,0.1);
        color: #9ae6b4;
        font-size: 0.78rem;
        padding: 0.5rem 0.85rem;
        border-radius: 0 3px 3px 0;
        margin-bottom: 1.25rem;
    }

    /* ── INPUTS ── */
    .field { margin-bottom: 1.1rem; }

    .flabel {
        display: block;
        font-size: 0.62rem;
        font-weight: 500;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.28);
        margin-bottom: 0.4rem;
    }

    .finput {
        width: 100%;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        font-weight: 300;
        color: #fff;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 4px;
        padding: 0.72rem 1rem;
        outline: none;
        transition: border-color 0.2s, background 0.2s;
    }
    .finput:focus {
        border-color: #c9723f;
        background: rgba(255,255,255,0.1);
        box-shadow: 0 0 0 3px rgba(201,114,63,0.15);
    }
    .finput::placeholder { color: rgba(255,255,255,0.18); }

    .ferror {
        font-size: 0.72rem;
        color: #fc8181;
        margin-top: 0.28rem;
    }

    /* ── CHECKBOX ── */
    .check-row {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        margin: 1rem 0 1.5rem;
    }
    .check-row input[type="checkbox"] {
        width: 14px; height: 14px;
        accent-color: #c9723f;
        cursor: pointer;
    }
    .check-row label {
        font-size: 0.78rem;
        font-weight: 300;
        color: rgba(255,255,255,0.3);
        cursor: pointer;
    }

    /* ── BTN ── */
    .btn-submit {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #c9723f;
        color: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        padding: 1rem 1.4rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s;
        box-shadow: 0 4px 20px rgba(201,114,63,0.4);
    }
    .btn-submit:hover {
        background: #a35928;
        transform: translateY(-1px);
        box-shadow: 0 8px 28px rgba(201,114,63,0.5);
    }
    .btn-arrow { transition: transform 0.2s; }
    .btn-submit:hover .btn-arrow { transform: translateX(4px); }

    /* ── LINKS ── */
    .card-links {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;
    }
    .lnk {
        font-size: 0.7rem;
        font-weight: 300;
        color: rgba(255,255,255,0.22);
        text-decoration: none;
        transition: color 0.15s;
    }
    .lnk:hover { color: rgba(255,255,255,0.6); }

    /* ── RESPONSIVE ── */
    @media (max-width: 860px) {
        .page { grid-template-columns: 1fr; }
        .col-left { display: none; }
        .col-right {
            border-left: none;
            padding: 2rem;
            justify-content: center;
        }
    }
</style>


<div class="bg-photo"></div>

<div class="page">

    {{-- Izquierda: branding + tagline --}}
    <div class="col-left">
        <a href="/" class="brand">
            <span style="font-size:1.2rem">📚</span>
            <span class="brand-text">Biblioteca Laravel</span>
        </a>

        <div class="tagline">
            <p class="tagline-eye">Sistema de gestión</p>
            <h2 class="tagline-h">
                Organiza tu<br><em>mundo</em><br>literario.
            </h2>
            <p class="tagline-sub">
                Administra libros, categorías<br>y usuarios desde un solo lugar.
            </p>
        </div>

        <p class="col-footer">© 2026 · Biblioteca Laravel</p>
    </div>

    {{-- Derecha: formulario --}}
    <div class="col-right">
        <div class="card">

            <p class="card-eye">Bienvenido de nuevo</p>
            <h1 class="card-title">Iniciar <em>sesión</em></h1>
            <p class="card-sub">Ingresa tus credenciales para acceder.</p>

            @if (session('status'))
                <div class="flash">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email" class="flabel">Correo electrónico</label>
                    <input id="email" type="email" name="email" class="finput"
                           value="{{ old('email') }}" required autofocus
                           placeholder="tu@correo.com">
                    @error('email') <p class="ferror">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label for="password" class="flabel">Contraseña</label>
                    <input id="password" type="password" name="password" class="finput"
                           required placeholder="••••••••">
                    @error('password') <p class="ferror">{{ $message }}</p> @enderror
                </div>

                <div class="check-row">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Recordarme</label>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Entrar al sistema</span>
                    <span class="btn-arrow">→</span>
                </button>

            </form>

            <div class="card-links">
                <a href="/" class="lnk">← Volver al inicio</a>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="lnk">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

        </div>
    </div>

</div>

</x-guest-layout>