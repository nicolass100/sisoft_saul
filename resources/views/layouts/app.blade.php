<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SISOFT_SAUL')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Quita cualquier margen o padding entre el header y el carrusel */
        body, html {
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden;
        }

        header, nav, main, .carousel {
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Hace que el menú se quede arriba fijo */
        .sticky-menu {
            position: sticky;
            top: 0;
            z-index: 1050;
        }

        /* Ajusta las imágenes del carrusel */
        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
        }

        /* Evita espacio visual */
        main {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }
    </style>
</head>
<body>

    {{-- Header fijo --}}
    <header class="sticky-menu">
        @include('partials.header')
        @include('partials.nav-categorias')
    </header>

    {{-- Contenido dinámico --}}
    <main class="m-0 p-0">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Modales --}}
    @include('partials.login-modal')
    @include('partials.register-modal')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
