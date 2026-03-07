<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<style>
    :root {
        --ink:    #1a1209;
        --paper:  #faf6ef;
        --accent: #c9723f;
        --muted:  #8b7d6b;
        --line:   #e2d9cc;
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
        font-family: 'DM Sans', sans-serif;
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
        margin: 0 0 2rem;
    }

    /* ── PROFILE LAYOUT ── */
    .profile-outer {
        display: grid;
        grid-template-columns: 220px 1fr;
        gap: 2rem;
        align-items: start;
    }

    @media (max-width: 768px) {
        .profile-outer { grid-template-columns: 1fr; }
        .profile-sidebar { display: none; }
    }

    /* ── SIDEBAR ── */
    .profile-sidebar {
        position: sticky;
        top: 2rem;
    }

    .avatar-card {
        background: var(--ink);
        border-radius: 4px;
        padding: 2rem 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
    }

    .avatar-circle {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent), #8b4513);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #fff;
        margin: 0 auto 1rem;
    }

    .avatar-name {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        font-weight: 600;
        color: var(--paper);
        margin-bottom: 0.2rem;
    }

    .avatar-email {
        font-family: 'DM Sans', sans-serif;
        font-size: 0.75rem;
        color: rgba(250,246,239,0.4);
        word-break: break-all;
    }

    .sidebar-nav {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        overflow: hidden;
    }

    .sidebar-nav-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.85rem 1.25rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--muted);
        border-bottom: 1px solid var(--line);
        text-decoration: none;
        cursor: pointer;
        transition: color 0.15s, background 0.15s;
    }
    .sidebar-nav-item:last-child { border-bottom: none; }
    .sidebar-nav-item:hover,
    .sidebar-nav-item.active {
        color: var(--ink);
        background: #fdf9f4;
    }
    .sidebar-nav-item.danger { color: #9b2c2c; }
    .sidebar-nav-item.danger:hover { background: #fdf2f0; }

    /* ── SECTION CARDS ── */
    .profile-sections {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .profile-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 4px;
        overflow: hidden;
    }

    .profile-card-head {
        padding: 1.25rem 2rem;
        border-bottom: 1px solid var(--line);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .profile-card-icon {
        width: 32px;
        height: 32px;
        border-radius: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .icon-info     { background: #f3ece3; }
    .icon-password { background: #edf4fb; }
    .icon-danger   { background: #fdf2f0; }

    .profile-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--ink);
        margin: 0;
    }

    .profile-card-body {
        padding: 2rem;
    }

    /* ── OVERRIDE BREEZE INPUTS ── */
    .profile-card-body input[type="text"],
    .profile-card-body input[type="email"],
    .profile-card-body input[type="password"] {
        width: 100%;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.9rem !important;
        color: var(--ink) !important;
        background: var(--paper) !important;
        border: 1px solid var(--line) !important;
        border-radius: 3px !important;
        padding: 0.75rem 1rem !important;
        outline: none !important;
        box-shadow: none !important;
        transition: border-color 0.2s, box-shadow 0.2s !important;
    }

    .profile-card-body input:focus {
        border-color: var(--accent) !important;
        box-shadow: 0 0 0 3px rgba(201,114,63,0.12) !important;
        background: #fff !important;
    }

    /* Labels */
    .profile-card-body label {
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.72rem !important;
        font-weight: 500 !important;
        letter-spacing: 0.12em !important;
        text-transform: uppercase !important;
        color: var(--muted) !important;
        margin-bottom: 0.5rem !important;
    }

    /* Breeze primary button */
    .profile-card-body button[type="submit"]:not(.btn-danger-custom) {
        background: var(--ink) !important;
        color: var(--paper) !important;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.78rem !important;
        font-weight: 500 !important;
        letter-spacing: 0.08em !important;
        text-transform: uppercase !important;
        padding: 0.75rem 1.75rem !important;
        border-radius: 2px !important;
        border: none !important;
        cursor: pointer !important;
        transition: background 0.2s !important;
    }

    .profile-card-body button[type="submit"]:not(.btn-danger-custom):hover {
        background: var(--accent) !important;
    }

    /* Breeze danger button */
    .profile-card-body button.btn-danger-custom,
    .profile-card-body [x-data] button[type="submit"] {
        background: transparent !important;
        color: #9b2c2c !important;
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.78rem !important;
        font-weight: 500 !important;
        letter-spacing: 0.08em !important;
        text-transform: uppercase !important;
        padding: 0.75rem 1.75rem !important;
        border-radius: 2px !important;
        border: 1px solid #f5c6be !important;
        background: #fdf2f0 !important;
        cursor: pointer !important;
        transition: background 0.2s, color 0.2s !important;
    }

    .profile-card-body [x-data] button[type="submit"]:hover {
        background: #9b2c2c !important;
        color: #fff !important;
        border-color: #9b2c2c !important;
    }

    /* Success message */
    .profile-card-body p.text-sm.text-gray-600 {
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.8rem !important;
        color: #276749 !important;
    }

    /* Error messages */
    .profile-card-body p.text-sm.text-red-600,
    .profile-card-body ul.text-sm.text-red-600 {
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.78rem !important;
        color: #9b2c2c !important;
    }

    /* Danger section description */
    .profile-card-body .text-gray-600,
    .profile-card-body .text-gray-500 {
        font-family: 'DM Sans', sans-serif !important;
        font-size: 0.88rem !important;
        color: var(--muted) !important;
    }

    /* Section titles inside partials */
    .profile-card-body h2 {
        font-family: 'Playfair Display', serif !important;
        font-size: 1rem !important;
        font-weight: 700 !important;
        color: var(--ink) !important;
        margin-bottom: 0.35rem !important;
    }

    .profile-card-body p:first-of-type {
        color: var(--muted) !important;
        font-size: 0.85rem !important;
        margin-bottom: 1.25rem !important;
    }
</style>


<div class="py-8">
<div class="container" style="max-width: 1000px;">

    <p class="page-eyebrow">Cuenta</p>
    <h1 class="page-title">Mi perfil</h1>

    <div class="profile-outer">

        {{-- Sidebar --}}
        <aside class="profile-sidebar">
            <div class="avatar-card">
                <div class="avatar-circle">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <p class="avatar-name">{{ Auth::user()->name }}</p>
                <p class="avatar-email">{{ Auth::user()->email }}</p>
            </div>

            <nav class="sidebar-nav">
                <a href="#info" class="sidebar-nav-item active">
                    👤 Información
                </a>
                <a href="#password" class="sidebar-nav-item">
                    🔒 Contraseña
                </a>
                <a href="#delete" class="sidebar-nav-item danger">
                    🗑️ Eliminar cuenta
                </a>
            </nav>
        </aside>

        {{-- Sections --}}
        <div class="profile-sections">

            {{-- Información personal --}}
            <div class="profile-card" id="info">
                <div class="profile-card-head">
                    <div class="profile-card-icon icon-info">👤</div>
                    <h2 class="profile-card-title">Información personal</h2>
                </div>
                <div class="profile-card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Contraseña --}}
            <div class="profile-card" id="password">
                <div class="profile-card-head">
                    <div class="profile-card-icon icon-password">🔒</div>
                    <h2 class="profile-card-title">Actualizar contraseña</h2>
                </div>
                <div class="profile-card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Eliminar cuenta --}}
            <div class="profile-card" id="delete">
                <div class="profile-card-head">
                    <div class="profile-card-icon icon-danger">🗑️</div>
                    <h2 class="profile-card-title" style="color:#9b2c2c;">Eliminar cuenta</h2>
                </div>
                <div class="profile-card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    // Smooth scroll + active sidebar
    document.querySelectorAll('.sidebar-nav-item').forEach(link => {
        link.addEventListener('click', function (e) {
            document.querySelectorAll('.sidebar-nav-item').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

</x-app-layout>