<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <title>Gestión de Libros</title>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            📚 Biblioteca Laravel
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/categorias">Categorías</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/libros">Libros</a>
                </li>

            </ul>
        </div>

    </div>
</nav>


<!-- CONTENIDO -->
<div class="container py-4" style="min-height: 75vh;">
    @yield('content')
</div>


<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-4">
    <div class="container">
        <p class="mb-0">© 2026 Sistema de Gestión de Libros | Laravel</p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>