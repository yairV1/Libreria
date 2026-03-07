<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sistema de Gestión de Librería</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Mono:wght@400;500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --ink: #0f0e0c;
      --paper: #f5f0e8;
      --cream: #ede8dc;
      --accent: #c84b2f;
      --gold: #b8913a;
      --sage: #4a6741;
      --muted: #7a7060;
      --border: #d4cfc4;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      background-color: var(--paper);
      color: var(--ink);
      font-family: 'DM Sans', sans-serif;
      font-weight: 300;
      line-height: 1.7;
      min-height: 100vh;
    }

    /* NOISE TEXTURE */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.035'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 0;
    }

    .container {
      max-width: 860px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 1;
    }

    /* ─── HERO ─── */
    .hero {
      padding: 5rem 0 3rem;
      border-bottom: 2px solid var(--ink);
      position: relative;
      overflow: hidden;
    }

    .hero::after {
      content: '📚';
      position: absolute;
      right: -1rem;
      top: 2rem;
      font-size: 11rem;
      opacity: 0.06;
      transform: rotate(-12deg);
      pointer-events: none;
    }

    .hero-tag {
      display: inline-block;
      font-family: 'DM Mono', monospace;
      font-size: 0.7rem;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--accent);
      border: 1px solid var(--accent);
      padding: 0.25rem 0.75rem;
      margin-bottom: 1.5rem;
      animation: fadeUp 0.6s ease both;
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.4rem, 6vw, 4rem);
      font-weight: 900;
      line-height: 1.1;
      letter-spacing: -0.02em;
      animation: fadeUp 0.7s 0.1s ease both;
    }

    h1 em {
      font-style: italic;
      color: var(--accent);
    }

    .hero-sub {
      margin-top: 1rem;
      color: var(--muted);
      font-size: 1.05rem;
      max-width: 540px;
      animation: fadeUp 0.7s 0.2s ease both;
    }

    .hero-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-top: 2rem;
      animation: fadeUp 0.7s 0.3s ease both;
    }

    .badge {
      font-family: 'DM Mono', monospace;
      font-size: 0.72rem;
      padding: 0.3rem 0.8rem;
      background: var(--ink);
      color: var(--paper);
      letter-spacing: 0.05em;
    }

    .badge.outline {
      background: transparent;
      border: 1.5px solid var(--border);
      color: var(--muted);
    }

    /* ─── SECTION ─── */
    section {
      padding: 3.5rem 0;
      border-bottom: 1px solid var(--border);
      animation: fadeUp 0.6s ease both;
    }

    .section-label {
      font-family: 'DM Mono', monospace;
      font-size: 0.65rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 0.6rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }

    .section-label::before {
      content: '';
      display: inline-block;
      width: 1.5rem;
      height: 1px;
      background: var(--muted);
    }

    h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.9rem;
      font-weight: 700;
      letter-spacing: -0.01em;
      margin-bottom: 1.5rem;
    }

    h3 {
      font-family: 'DM Sans', sans-serif;
      font-size: 0.85rem;
      font-weight: 500;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--muted);
      margin: 1.8rem 0 0.8rem;
    }

    p {
      color: var(--muted);
      font-size: 0.97rem;
    }

    /* ─── TECH GRID ─── */
    .tech-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 1px;
      background: var(--border);
      border: 1px solid var(--border);
      margin-top: 1rem;
    }

    .tech-item {
      background: var(--paper);
      padding: 1.2rem 1rem;
      text-align: center;
      transition: background 0.2s;
    }

    .tech-item:hover { background: var(--cream); }

    .tech-icon { font-size: 1.5rem; margin-bottom: 0.35rem; }

    .tech-name {
      font-family: 'DM Mono', monospace;
      font-size: 0.72rem;
      color: var(--ink);
      letter-spacing: 0.04em;
    }

    /* ─── STEPS ─── */
    .steps {
      display: flex;
      flex-direction: column;
      gap: 0;
    }

    .step {
      display: grid;
      grid-template-columns: 3rem 1fr;
      gap: 1.2rem;
      padding: 1.6rem 0;
      border-bottom: 1px dashed var(--border);
      position: relative;
    }

    .step:last-child { border-bottom: none; }

    .step-num {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 700;
      color: var(--border);
      line-height: 1;
      padding-top: 0.15rem;
    }

    .step-title {
      font-family: 'DM Sans', sans-serif;
      font-size: 0.95rem;
      font-weight: 500;
      color: var(--ink);
      margin-bottom: 0.3rem;
    }

    .step-desc {
      font-size: 0.88rem;
      color: var(--muted);
      margin-bottom: 0.6rem;
    }

    /* ─── CODE BLOCK ─── */
    pre {
      background: var(--ink);
      color: #e8e4da;
      padding: 1rem 1.2rem;
      font-family: 'DM Mono', monospace;
      font-size: 0.78rem;
      line-height: 1.7;
      overflow-x: auto;
      border-left: 3px solid var(--accent);
      margin-top: 0.6rem;
    }

    code { font-family: 'DM Mono', monospace; }

    .code-comment { color: #6a6458; }
    .code-key { color: #c8a96e; }
    .code-val { color: #7daf7d; }

    /* ─── VIEWS GRID ─── */
    .views-split {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem;
      margin-top: 1rem;
    }

    .view-group {
      border: 1px solid var(--border);
      padding: 1.2rem 1.4rem;
    }

    .view-group-title {
      font-family: 'DM Mono', monospace;
      font-size: 0.7rem;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 0.8rem;
      padding-bottom: 0.6rem;
      border-bottom: 1px solid var(--border);
    }

    .view-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
    }

    .view-list li {
      font-size: 0.85rem;
      color: var(--muted);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .view-list li::before {
      content: '→';
      color: var(--accent);
      font-size: 0.75rem;
    }

    /* ─── FOLDER TREE ─── */
    .tree {
      font-family: 'DM Mono', monospace;
      font-size: 0.8rem;
      background: var(--cream);
      padding: 1.5rem;
      border: 1px solid var(--border);
      color: var(--ink);
      line-height: 2;
    }

    .tree .folder { color: var(--sage); font-weight: 500; }
    .tree .file { color: var(--muted); }
    .tree .accent-file { color: var(--accent); }

    /* ─── INSTALL STEPS ─── */
    .install-steps {
      counter-reset: install;
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
      margin-top: 1rem;
    }

    .install-step {
      counter-increment: install;
      display: grid;
      grid-template-columns: 2rem 1fr;
      gap: 1rem;
      align-items: start;
    }

    .install-step::before {
      content: counter(install);
      font-family: 'DM Mono', monospace;
      font-size: 0.75rem;
      width: 2rem;
      height: 2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1.5px solid var(--accent);
      color: var(--accent);
      flex-shrink: 0;
    }

    .install-step-label {
      font-size: 0.88rem;
      font-weight: 500;
      color: var(--ink);
      margin-bottom: 0.3rem;
    }

    /* ─── FOOTER ─── */
    footer {
      padding: 3rem 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .footer-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      font-weight: 700;
    }

    .footer-sub {
      font-family: 'DM Mono', monospace;
      font-size: 0.68rem;
      color: var(--muted);
      letter-spacing: 0.1em;
      margin-top: 0.2rem;
    }

    .footer-rule {
      font-family: 'DM Mono', monospace;
      font-size: 0.68rem;
      color: var(--muted);
      text-align: right;
    }

    /* ─── ANIMATIONS ─── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(14px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 600px) {
      .views-split { grid-template-columns: 1fr; }
      .tech-grid { grid-template-columns: repeat(auto-fill, minmax(90px, 1fr)); }
      footer { flex-direction: column; text-align: left; }
      .footer-rule { text-align: left; }
    }
  </style>
</head>
<body>

<div class="container">

  <!-- HERO -->
  <header class="hero">
    <div class="hero-tag">Proyecto Laravel · PHP</div>
    <h1>Sistema de Gestión<br>de <em>Librería</em></h1>
    <p class="hero-sub">
      Panel de administración para gestionar libros y categorías con operaciones CRUD completas, autenticación y diseño responsivo.
    </p>
    <div class="hero-badges">
      <span class="badge">Laravel</span>
      <span class="badge">PHP</span>
      <span class="badge">MySQL</span>
      <span class="badge outline">Blade Templates</span>
      <span class="badge outline">Bootstrap</span>
      <span class="badge outline">Vite</span>
    </div>
  </header>

  <!-- TECNOLOGÍAS -->
  <section>
    <div class="section-label">Stack</div>
    <h2>Tecnologías utilizadas</h2>
    <div class="tech-grid">
      <div class="tech-item"><div class="tech-icon">🐘</div><div class="tech-name">PHP</div></div>
      <div class="tech-item"><div class="tech-icon">🔴</div><div class="tech-name">Laravel</div></div>
      <div class="tech-item"><div class="tech-icon">🍃</div><div class="tech-name">Blade</div></div>
      <div class="tech-item"><div class="tech-icon">🎨</div><div class="tech-name">Bootstrap</div></div>
      <div class="tech-item"><div class="tech-icon">🗄️</div><div class="tech-name">MySQL</div></div>
      <div class="tech-item"><div class="tech-icon">📦</div><div class="tech-name">Composer</div></div>
      <div class="tech-item"><div class="tech-icon">🟢</div><div class="tech-name">Node.js</div></div>
      <div class="tech-item"><div class="tech-icon">⚡</div><div class="tech-name">Vite</div></div>
    </div>
  </section>

  <!-- PROCESO DE DESARROLLO -->
  <section>
    <div class="section-label">Proceso</div>
    <h2>Desarrollo paso a paso</h2>

    <div class="steps">

      <div class="step">
        <div class="step-num">01</div>
        <div>
          <div class="step-title">Creación del proyecto</div>
          <p class="step-desc">Proyecto generado con Composer usando la plantilla oficial de Laravel.</p>
          <pre><code>composer create-project laravel/laravel bibliotecas</code></pre>
        </div>
      </div>

      <div class="step">
        <div class="step-num">02</div>
        <div>
          <div class="step-title">Configuración del entorno <code>.env</code></div>
          <p class="step-desc">Parámetros de conexión con la base de datos MySQL local.</p>
          <pre><code><span class="code-key">DB_CONNECTION</span>=<span class="code-val">mysql</span>
<span class="code-key">DB_HOST</span>=<span class="code-val">127.0.0.1</span>
<span class="code-key">DB_PORT</span>=<span class="code-val">3306</span>
<span class="code-key">DB_DATABASE</span>=<span class="code-val">biblioteca</span>
<span class="code-key">DB_USERNAME</span>=<span class="code-val">root</span>
<span class="code-key">DB_PASSWORD</span>=<span class="code-val"></span></code></pre>
        </div>
      </div>

      <div class="step">
        <div class="step-num">03</div>
        <div>
          <div class="step-title">Creación de migraciones</div>
          <p class="step-desc">Definición de la estructura de tablas: nombre, descripción, estado y timestamps. Permite control de versiones de la base de datos.</p>
        </div>
      </div>

      <div class="step">
        <div class="step-num">04</div>
        <div>
          <div class="step-title">Ejecución de migraciones</div>
          <p class="step-desc">Generación automática de las tablas en la base de datos.</p>
          <pre><code>php artisan migrate</code></pre>
        </div>
      </div>

      <div class="step">
        <div class="step-num">05</div>
        <div>
          <div class="step-title">Modelos Eloquent</div>
          <p class="step-desc">Creación de los modelos <strong>Libro</strong> y <strong>Categoria</strong> para interactuar con la base de datos mediante el ORM de Laravel.</p>
        </div>
      </div>

      <div class="step">
        <div class="step-num">06</div>
        <div>
          <div class="step-title">Controladores CRUD</div>
          <p class="step-desc">Lógica para mostrar, crear, editar y eliminar registros conectando vistas con modelos.</p>
        </div>
      </div>

      <div class="step">
        <div class="step-num">07</div>
        <div>
          <div class="step-title">Vistas con Blade</div>
          <p class="step-desc">Interfaces para cada entidad con Bootstrap y estilos personalizados.</p>
          <div class="views-split">
            <div class="view-group">
              <div class="view-group-title">📂 Categorías</div>
              <ul class="view-list">
                <li>Listar categorías</li>
                <li>Crear categoría</li>
                <li>Editar categoría</li>
                <li>Ver categoría</li>
              </ul>
            </div>
            <div class="view-group">
              <div class="view-group-title">📚 Libros</div>
              <ul class="view-list">
                <li>Listar libros</li>
                <li>Crear libro</li>
                <li>Editar libro</li>
                <li>Ver libro</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="step">
        <div class="step-num">08</div>
        <div>
          <div class="step-title">Autenticación con Laravel Breeze</div>
          <p class="step-desc">Login, registro, recuperación de contraseña y panel de usuario. Solo usuarios autenticados pueden acceder al sistema.</p>
        </div>
      </div>

      <div class="step">
        <div class="step-num">09</div>
        <div>
          <div class="step-title">Diseño e interfaz final</div>
          <p class="step-desc">Tablas estilizadas, botones personalizados, formularios limpios y dashboard organizado visualmente.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- ESTRUCTURA -->
  <section>
    <div class="section-label">Arquitectura</div>
    <h2>Estructura del proyecto</h2>
    <div class="tree">
<span class="folder">app/</span><br>
&nbsp;&nbsp;├── <span class="folder">Http/Controllers/</span><br>
&nbsp;&nbsp;└── <span class="folder">Models/</span><br>
<br>
<span class="folder">resources/</span><br>
&nbsp;&nbsp;└── <span class="folder">views/</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├── <span class="folder">categorias/</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├── <span class="folder">libros/</span><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└── <span class="folder">layouts/</span><br>
<br>
<span class="folder">database/</span><br>
&nbsp;&nbsp;└── <span class="folder">migrations/</span><br>
<br>
<span class="folder">routes/</span><br>
&nbsp;&nbsp;└── <span class="accent-file">web.php</span>
    </div>
  </section>

  <!-- INSTALACIÓN -->
  <section>
    <div class="section-label">Instalación</div>
    <h2>Cómo ejecutar el proyecto</h2>

    <div class="install-steps">

      <div class="install-step">
        <div>
          <div class="install-step-label">Clonar el repositorio</div>
          <pre><code>git clone URL_DEL_REPOSITORIO</code></pre>
        </div>
      </div>

      <div class="install-step">
        <div>
          <div class="install-step-label">Instalar dependencias</div>
          <pre><code>composer install
npm install</code></pre>
        </div>
      </div>

      <div class="install-step">
        <div>
          <div class="install-step-label">Configurar el archivo <code>.env</code></div>
          <p style="font-size:0.85rem; color:var(--muted); margin-top:0.3rem">Copiar <code>.env.example</code> como <code>.env</code> y ajustar las credenciales de base de datos.</p>
        </div>
      </div>

      <div class="install-step">
        <div>
          <div class="install-step-label">Ejecutar migraciones</div>
          <pre><code>php artisan migrate</code></pre>
        </div>
      </div>

      <div class="install-step">
        <div>
          <div class="install-step-label">Iniciar el servidor</div>
          <pre><code>php artisan serve</code></pre>
          <p style="font-size:0.82rem; color:var(--muted); margin-top:0.5rem">Abrir en el navegador → <code style="color:var(--accent)">http://127.0.0.1:8000</code></p>
        </div>
      </div>

    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div>
      <div class="footer-title">Sistema de Gestión de Librería</div>
      <div class="footer-sub">Proyecto de práctica · Laravel Framework</div>
    </div>
    <div class="footer-rule">
      Desarrollado con<br>
      PHP · Laravel · MySQL
    </div>
  </footer>

</div>

</body>
</html>
