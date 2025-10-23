<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SISOFT_SAUL')</title>

  {{-- Bootstrap y FontAwesome --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body, html {
      margin: 0 !important;
      padding: 0 !important;
      overflow-x: hidden;
    }
    header, nav, main, .carousel {
      margin: 0 !important;
      padding: 0 !important;
    }
    .sticky-menu {
      position: sticky;
      top: 0;
      z-index: 1050;
    }
    .carousel-item img {
      width: 100%;
      height: 500px;
      object-fit: cover;
      display: block;
    }
    main {
      padding-top: 0 !important;
      margin-top: 0 !important;
    }

    /* 🔹 Lightbox global */
    #global-lightbox {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100vw; height: 100vh;
      background: rgba(0,0,0,0.9);
      justify-content: center;
      align-items: center;
      z-index: 999999;
    }
    #global-lightbox img {
      max-width: 85%;
      max-height: 85%;
      border-radius: 10px;
      object-fit: contain;
      box-shadow: 0 0 25px rgba(255,255,255,0.3);
    }
    #global-lightbox .close {
      position: absolute;
      top: 20px;
      right: 35px;
      font-size: 3rem;
      color: white;
      cursor: pointer;
    }
    #global-lightbox .nav {
      position: absolute;
      top: 50%;
      font-size: 3rem;
      color: white;
      cursor: pointer;
    }
    #global-lightbox .prev { left: 50px; }
    #global-lightbox .next { right: 50px; }

    /* 🔹 Botón flotante de WhatsApp */
    .whatsapp-float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 25px;
      right: 25px;
      background-color: #25d366;
      color: #fff;
      border-radius: 50%;
      text-align: center;
      font-size: 30px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.25);
      z-index: 9999;
      transition: all 0.3s ease;
    }
    .whatsapp-float:hover {
      background-color: #1ebe57;
      transform: scale(1.1);
      color: #fff;
    }
    .whatsapp-float i {
      margin-top: 15px;
    }
  </style>
</head>

<body>
  <header class="sticky-menu">
    @include('partials.header')
    @include('partials.nav-categorias')
  </header>

  <main class="m-0 p-0">
    @yield('content')
  </main>

  @include('partials.footer')
  @include('partials.login-modal')
  @include('partials.register-modal')

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  {{-- Scripts personalizados --}}
  @stack('scripts')

  {{-- Botón flotante global de WhatsApp --}}
  @php
      $telefono = "956167490"; 
      $nombreUsuario = Auth::check() ? Auth::user()->name : 'Cliente';
      $mensaje = "¡Hola! Soy $nombreUsuario y quiero más información sobre sus productos y servicios.";
  @endphp

  <a href="https://wa.me/{{ $telefono }}?text={{ urlencode($mensaje) }}"
     class="whatsapp-float"
     target="_blank"
     title="Contáctanos por WhatsApp">
     <i class="fab fa-whatsapp"></i>
  </a>
</body>
</html>

<!-- Lightbox fuera del flujo del HTML principal -->
<div id="global-lightbox">
  <span class="close">&times;</span>
  <img id="global-lightbox-img" src="" alt="Vista ampliada">
  <a class="nav prev">&#10094;</a>
  <a class="nav next">&#10095;</a>
</div>
