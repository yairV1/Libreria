<style>
    :root {
        --ink: #1a1209;
        --paper: #faf6ef;
        --accent: #c9723f;
        --accent-dark: #a35928;
        --muted: #8b7d6b;
        --line: #e2d9cc;
    }

    .nav-biblioteca {
        background: var(--ink);
        border-bottom: 1px solid #2e2416;
        font-family: 'DM Sans', sans-serif;
    }

    .nav-biblioteca .nav-brand {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--paper);
        text-decoration: none;
        letter-spacing: -0.02em;
    }

    .nav-biblioteca .nav-brand:hover {
        color: var(--paper);
    }

    .nav-biblioteca .nav-link-item {
        color: var(--muted);
        font-size: 0.78rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0.35rem 0;
        border-bottom: 1.5px solid transparent;
        transition: color 0.2s, border-color 0.2s;
    }

    .nav-biblioteca .nav-link-item:hover,
    .nav-biblioteca .nav-link-item.active {
        color: var(--paper);
        border-bottom-color: var(--accent);
    }

    /* User dropdown trigger */
    .nav-biblioteca .nav-user-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: transparent;
        border: 1px solid #2e2416;
        border-radius: 3px;
        color: var(--muted);
        font-size: 0.8rem;
        font-family: 'DM Sans', sans-serif;
        padding: 0.4rem 0.9rem;
        cursor: pointer;
        transition: border-color 0.2s, color 0.2s;
    }

    .nav-biblioteca .nav-user-btn:hover {
        border-color: var(--muted);
        color: var(--paper);
    }

    /* Hamburger */
    .nav-biblioteca .hamburger-btn {
        background: transparent;
        border: 1px solid #2e2416;
        border-radius: 3px;
        padding: 0.4rem;
        color: var(--muted);
        transition: border-color 0.2s, color 0.2s;
    }

    .nav-biblioteca .hamburger-btn:hover {
        border-color: var(--muted);
        color: var(--paper);
    }

    /* Mobile menu */
    .nav-biblioteca .mobile-menu {
        border-top: 1px solid #2e2416;
        background: var(--ink);
    }

    .nav-biblioteca .mobile-link {
        display: block;
        color: var(--muted);
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0.75rem 1.5rem;
        border-left: 2px solid transparent;
        transition: color 0.2s, border-color 0.2s;
    }

    .nav-biblioteca .mobile-link:hover,
    .nav-biblioteca .mobile-link.active {
        color: var(--paper);
        border-left-color: var(--accent);
        background: rgba(255,255,255,0.03);
    }

    .nav-biblioteca .mobile-user-name {
        color: var(--paper);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .nav-biblioteca .mobile-user-email {
        color: var(--muted);
        font-size: 0.78rem;
    }

    .nav-biblioteca .mobile-divider {
        border-color: #2e2416;
    }

    /* Dropdown panel override (para x-dropdown de Breeze) */
    .nav-biblioteca ~ * .dropdown-content,
    .dropdown-content {
        background: var(--ink) !important;
        border: 1px solid #2e2416 !important;
        border-radius: 4px !important;
        box-shadow: 0 8px 30px rgba(0,0,0,0.4) !important;
    }

    .dropdown-content a {
        color: var(--muted) !important;
        font-size: 0.82rem !important;
        letter-spacing: 0.05em;
        transition: color 0.15s, background 0.15s !important;
    }

    .dropdown-content a:hover {
        background: rgba(255,255,255,0.05) !important;
        color: var(--paper) !important;
    }
</style>

<!-- Google Fonts (si no están ya en el layout) -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<nav x-data="{ open: false }" class="nav-biblioteca">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo / Brand -->
            <div class="flex items-center gap-10">
                <!-- Nav links (desktop) -->
                <div class="hidden sm:flex items-center gap-8">
                    <a href="/libros"
                       class="nav-link-item {{ request()->is('libros*') ? 'active' : '' }}">
                        Libros
                    </a>
                    <a href="/categorias"
                       class="nav-link-item {{ request()->is('categorias*') ? 'active' : '' }}">
                        Categorías
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (desktop) -->
            <div class="hidden sm:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="nav-user-btn">
                            {{ Auth::user()->name }}
                            <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (mobile) -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="hamburger-btn">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden mobile-menu">
        <div class="py-2">
            <a href="/libros"
               class="mobile-link {{ request()->is('libros*') ? 'active' : '' }}">
                Libros
            </a>
            <a href="/categorias"
               class="mobile-link {{ request()->is('categorias*') ? 'active' : '' }}">
                Categorías
            </a>
        </div>

        <!-- User info + logout -->
        <div class="pt-3 pb-2 border-t mobile-divider">
            <div class="px-6 mb-3">
                <div class="mobile-user-name">{{ Auth::user()->name }}</div>
                <div class="mobile-user-email">{{ Auth::user()->email }}</div>
            </div>
            <a href="{{ route('profile.edit') }}" class="mobile-link">Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mobile-link w-full text-left"
                        style="background:none; border:none; cursor:pointer;">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</nav>