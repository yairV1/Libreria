<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <title>Gestión de Libros</title>

    <style>
        :root {
            --ink: #1a1209;
            --paper: #faf6ef;
            --accent: #c9723f;
            --accent-dark: #a35928;
            --muted: #8b7d6b;
            --line: #e2d9cc;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--paper);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;

            
        }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--ink) !important;
            border-bottom: 1px solid #2e2416;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--paper) !important;
            letter-spacing: -0.02em;
        }

        .nav-link {
            color: var(--muted) !important;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .nav-link:hover { color: var(--paper) !important; }

        .btn-nav-login {
            background: var(--accent);
            color: #fff !important;
            border-radius: 3px;
            padding: 0.4rem 1.1rem !important;
            font-size: 0.8rem !important;
            letter-spacing: 0.08em;
            transition: background 0.2s;
        }

        .btn-nav-login:hover { background: var(--accent-dark) !important; }

        /* ── HERO ── */
        .hero {
            position: relative;
            min-height: 92vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            overflow: hidden;
        }

        /* Texture background */
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(0deg, transparent, transparent 39px, var(--line) 39px, var(--line) 40px),
                repeating-linear-gradient(90deg, transparent, transparent 39px, var(--line) 39px, var(--line) 40px);
            opacity: 0.4;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 5rem 4rem 5rem 8vw;
            animation: fadeUp 0.9s ease both;
        }

        .hero-eyebrow {
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .hero-eyebrow::before {
            content: '';
            display: block;
            width: 32px;
            height: 1px;
            background: var(--accent);
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 5.5vw, 5.5rem);
            font-weight: 900;
            line-height: 1.0;
            letter-spacing: -0.03em;
            color: var(--ink);
            margin-bottom: 1.5rem;
        }

        .hero-title em {
            font-style: italic;
            color: var(--accent);
        }

        .hero-desc {
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.75;
            max-width: 420px;
            margin-bottom: 2.5rem;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: var(--ink);
            color: var(--paper);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 1rem 2rem;
            border: none;
            border-radius: 2px;
            text-decoration: none;
            transition: background 0.25s, transform 0.2s;
            cursor: pointer;
        }

        .btn-cta:hover {
            background: var(--accent);
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-cta svg {
            transition: transform 0.2s;
        }

        .btn-cta:hover svg { transform: translateX(4px); }

        .btn-cta-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 1.5px solid var(--line);
            color: var(--muted);
            font-size: 0.875rem;
            font-weight: 400;
            padding: 0.95rem 1.8rem;
            border-radius: 2px;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-cta-outline:hover {
            border-color: var(--ink);
            color: var(--ink);
        }

        /* ── HERO VISUAL SIDE ── */
        .hero-visual {
            position: relative;
            z-index: 2;
            height: 100%;
            min-height: 92vh;
            background: var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 3rem;
            animation: fadeIn 1.2s ease both;
        }

        .books-stack {
            position: relative;
            width: 260px;
            height: 380px;
        }

        .book {
            position: absolute;
            border-radius: 3px 8px 8px 3px;
            box-shadow: -4px 4px 16px rgba(0,0,0,0.5);
            transition: transform 0.4s;
        }

        .book:hover { transform: translateY(-8px) !important; }

        .book-1 {
            width: 160px; height: 220px;
            background: linear-gradient(135deg, #c9723f, #8b4513);
            top: 60px; left: 20px;
            transform: rotate(-4deg);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            padding: 1rem;
        }

        .book-2 {
            width: 140px; height: 200px;
            background: linear-gradient(135deg, #2d5a6b, #1a3a47);
            top: 90px; left: 100px;
            transform: rotate(3deg);
        }

        .book-3 {
            width: 130px; height: 190px;
            background: linear-gradient(135deg, #6b5a2d, #453a1a);
            top: 130px; left: 60px;
            transform: rotate(-1deg);
        }

        .book-spine {
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 18px;
            background: rgba(0,0,0,0.3);
            border-radius: 3px 0 0 3px;
        }

        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.9);
            text-align: center;
            line-height: 1.3;
        }

        .floating-stat {
            position: absolute;
            background: rgba(250,246,239,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 6px;
            padding: 1rem 1.3rem;
            color: var(--paper);
        }

        .floating-stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
        }

        .floating-stat-label {
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.5);
            margin-top: 0.2rem;
        }

        .stat-top { top: 15%; right: 8%; animation: float 4s ease-in-out infinite; }
        .stat-bottom { bottom: 15%; left: 6%; animation: float 4s ease-in-out infinite 1.5s; }

        /* ── FEATURES ── */
        .features-section {
            padding: 6rem 0;
            border-top: 1px solid var(--line);
        }

        .section-label {
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 3.5vw, 2.8rem);
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: var(--ink);
        }

        .feature-card {
            padding: 2rem;
            border: 1px solid var(--line);
            border-radius: 4px;
            background: #fff;
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(201,114,63,0.1);
        }

        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .feature-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--ink);
        }

        .feature-desc {
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.65;
        }

        /* ── CTA BAND ── */
        .cta-band {
            background: var(--ink);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .cta-band::before {
            content: '📚';
            position: absolute;
            font-size: 18rem;
            opacity: 0.03;
            right: -2rem;
            top: -3rem;
            pointer-events: none;
        }

        .cta-band-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 900;
            color: var(--paper);
            letter-spacing: -0.02em;
            line-height: 1.1;
        }

        .cta-band-title em {
            font-style: italic;
            color: var(--accent);
        }

        .cta-band-sub {
            color: rgba(250,246,239,0.5);
            font-size: 1rem;
            margin-top: 1rem;
            max-width: 420px;
        }

        .btn-cta-light {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: var(--paper);
            color: var(--ink);
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 1rem 2.2rem;
            border-radius: 2px;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s;
        }

        .btn-cta-light:hover {
            background: var(--accent);
            color: #fff;
            transform: translateY(-2px);
        }

        /* ── FOOTER ── */
        footer {
            background: #110d07;
            color: rgba(250,246,239,0.4);
            font-size: 0.8rem;
            padding: 1.5rem 0;
            text-align: center;
            border-top: 1px solid #2e2416;
        }

        footer span { color: var(--accent); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .hero-content {
                padding: 4rem 2rem 3rem;
            }

            .hero-visual {
                min-height: 50vh;
            }

            .stat-top, .stat-bottom { display: none; }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            Biblioteca Laravel
        </a>

        <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link btn-nav-login" href="/login">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- HERO -->
<section class="hero">

    <!-- Texto -->
    <div class="hero-content">
        <p class="hero-eyebrow">Sistema de Gestión</p>
        <h1 class="hero-title">
            Tu biblioteca,<br>
            <em>organizada</em><br>
            al detalle.
        </h1>
        <p class="hero-desc">
            Administra libros, categorías y usuarios desde un solo lugar.
            Rápido, claro y pensado para que nada se te pierda.
        </p>
        <div class="d-flex flex-wrap gap-3 align-items-center">
            <a href="/login" class="btn-cta">
                Acceder al sistema
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
            <a href="/libros" class="btn-cta-outline">
                Ver catálogo
            </a>
        </div>
    </div>

    <!-- Visual -->
    <div class="hero-visual">

        <!-- Books illustration -->
        <div class="books-stack">
            <div class="book book-3">
                <div class="book-spine"></div>
            </div>
            <div class="book book-2">
                <div class="book-spine"></div>
            </div>
            <div class="book book-1">
                <div class="book-spine"></div>
                <span class="book-title">Mi<br>Biblioteca</span>
            </div>
        </div>

        <!-- Floating stats -->
        <div class="floating-stat stat-top">
            <div class="floating-stat-num">∞</div>
            <div class="floating-stat-label">Libros</div>
        </div>

        <div class="floating-stat stat-bottom">
            <div class="floating-stat-num">01</div>
            <div class="floating-stat-label">Sistema</div>
        </div>
    </div>
</section>


<!-- FEATURES -->
<section class="features-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-5">
                <p class="section-label">¿Qué puedes hacer?</p>
                <h2 class="section-title">Todo lo que necesitas<br>en un sistema.</h2>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">📖</div>
                    <h3 class="feature-title">Catálogo de Libros</h3>
                    <p class="feature-desc">Agrega, edita y consulta todos tus libros con información detallada: título, autor, categoría y más.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🗂️</div>
                    <h3 class="feature-title">Categorías</h3>
                    <p class="feature-desc">Organiza tu biblioteca por categorías personalizadas para encontrar lo que buscas en segundos.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">🔐</div>
                    <h3 class="feature-title">Acceso Seguro</h3>
                    <p class="feature-desc">Sistema de autenticación con Laravel para que solo los usuarios autorizados gestionen el contenido.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- CTA BAND -->
<section class="cta-band">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h2 class="cta-band-title">¿Listo para<br><em>empezar?</em></h2>
                <p class="cta-band-sub">Inicia sesión y toma el control de tu biblioteca desde ahora.</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <a href="/login" class="btn-cta-light">
                    Ir al login
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- FOOTER -->
<footer>
    <div class="container">
        <p>© 2026 Sistema de Gestión de Libros · Construido con <span>Laravel</span></p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>