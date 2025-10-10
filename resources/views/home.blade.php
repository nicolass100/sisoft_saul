@extends('layouts.app')

@section('title', 'Inicio - SISOFT_SAUL')

@section('content')

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="hover">
  <!-- Indicadores -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4"></button>
  </div>

  <!-- Slides -->
  <div class="carousel-inner">

    <!-- SLIDE 0: BIENVENIDA -->
    <div class="carousel-item active">
      <div class="d-flex align-items-center justify-content-center text-center bg-gradient position-relative" 
           style="height: 480px; background: linear-gradient(135deg, #002B5B, #005EB8); color: white;">
        <div class="container">
          <h1 class="display-5 fw-bold mb-3 animate__animated animate__fadeInDown">Bienvenido a <span class="text-warning">SISOFT_SAUL 🚀</span></h1>
          <p class="lead mb-4 animate__animated animate__fadeInUp">Explora nuestro catálogo de productos y encuentra lo que necesitas.</p>
          <a href="/productos" class="btn btn-warning fw-bold px-4 py-2 shadow-sm">Ver catálogo</a>
        </div>
      </div>
    </div>

    <!-- Banner 1 -->
    <div class="carousel-item">
      <img src="{{ asset('images/firecuda1tb.jpg') }}" class="d-block w-100" alt="Laptops de alto rendimiento">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-shadow">💻 Laptops de Alto Rendimiento</h2>
        <p>Potencia, diseño y durabilidad en un solo equipo.</p>
        <a href="{{ url('/productos?q=laptops') }}" class="btn btn-primary px-4">Ver más</a>
      </div>
    </div>

    <!-- Banner 2 -->
    <div class="carousel-item">
      <img src="{{ asset('images/firecuda-1tb.jpg') }}" class="d-block w-100" alt="Impresoras Profesionales">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-shadow">🖨️ Impresoras Profesionales</h2>
        <p>Imprime más, gasta menos. Alta productividad para tu oficina.</p>
        <a href="{{ url('/productos?q=impresoras') }}" class="btn btn-warning px-4">Explorar</a>
      </div>
    </div>

    <!-- Banner 3 -->
    <div class="carousel-item">
      <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100" alt="Zona Gamer">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-shadow">🎮 Zona Gamer</h2>
        <p>Equipos con potencia extrema y estética única.</p>
        <a href="{{ url('/productos?q=gamer') }}" class="btn btn-danger px-4">Ver equipos</a>
      </div>
    </div>

    <!-- Banner 4 -->
    <div class="carousel-item">
      <img src="{{ asset('images/banner4.jpg') }}" class="d-block w-100" alt="Monitores HD">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold text-shadow">📺 Monitores Ultra HD</h2>
        <p>Resolución perfecta para diseñadores y gamers.</p>
        <a href="{{ url('/productos?q=monitores') }}" class="btn btn-info px-4">Ver catálogo</a>
      </div>
    </div>
  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<style>
  #mainCarousel img {
    height: 480px;
    object-fit: cover;
  }

  .carousel-caption {
    background: rgba(0, 0, 0, 0.45);
    padding: 1.5rem;
    border-radius: 10px;
    animation: fadeInUp 0.8s ease-in-out;
  }

  .text-shadow {
    text-shadow: 1px 1px 4px rgba(0,0,0,0.8);
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 768px) {
    #mainCarousel img,
    #mainCarousel .bg-gradient {
      height: 250px;
    }
    .carousel-caption {
      font-size: 14px;
      padding: 1rem;
    }
  }
</style>


<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Soluciones para cada Necesidad</h2>

        <div class="row justify-content-center g-4">
            <!-- Tarjeta Hogar -->
            <div class="col-md-4">
                <a href="{{ url('/productos?q=hogar') }}" class="text-decoration-none text-white">
                    <div class="card border-0 shadow-sm position-relative overflow-hidden">
                        <img src="{{ asset('images/hogar.jpg') }}" class="card-img" alt="Hogar">
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-4"
                             style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);">
                            <h4 class="fw-bold mb-0">Hogar</h4>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tarjeta Empresas -->
            <div class="col-md-4">
                <a href="{{ url('/productos?q=empresa') }}" class="text-decoration-none text-white">
                    <div class="card border-0 shadow-sm position-relative overflow-hidden">
                        <img src="{{ asset('images/empresa.jpg') }}" class="card-img" alt="Empresas">
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-4"
                             style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);">
                            <h4 class="fw-bold mb-0">Empresas</h4>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tarjeta Gamer -->
            <div class="col-md-4">
                <a href="{{ url('/productos?q=gamer') }}" class="text-decoration-none text-white">
                    <div class="card border-0 shadow-sm position-relative overflow-hidden">
                        <img src="{{ asset('images/gamer.jpg') }}" class="card-img" alt="Gamer">
                        <div class="card-img-overlay d-flex flex-column justify-content-end p-4"
                             style="background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);">
                            <h4 class="fw-bold mb-0">Gamer</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.card img {
    height: 260px;
    object-fit: cover;
    transition: transform 0.4s ease, filter 0.4s ease;
}
.card:hover img {
    transform: scale(1.08);
    filter: brightness(0.9);
}
.card:hover h4 {
    text-decoration: underline;
}
</style>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Cámaras de Seguridad</h2>
    <div class="row align-items-center">

      <!-- Imagen lateral izquierda -->
      <div class="col-md-3">
        <img src="{{ asset('images/banner_camaras.jpg') }}" 
             alt="Cámaras de Seguridad" 
             class="img-fluid rounded shadow-sm">
      </div>

      <!-- Carrusel de productos -->
      <div class="col-md-9">
        <div id="carouselCamaras" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <!-- Grupo 1 -->
            <div class="carousel-item active">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/camara_ip1080p.jpg', 'nombre' => 'Cámara IP 1080p Full HD', 'precio' => 149.00, 'id' => 501],
                  ['img' => 'images/camara_ptz_exterior.jpg', 'nombre' => 'Cámara PTZ Exterior 360°', 'precio' => 189.00, 'id' => 502],
                  ['img' => 'images/kit_dvr_2cam.jpg', 'nombre' => 'Kit DVR + 2 Cámaras HD', 'precio' => 499.00, 'id' => 503],
                  ['img' => 'images/mini_wifi.jpg', 'nombre' => 'Mini Cámara WiFi Nocturna', 'precio' => 129.00, 'id' => 504],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" 
                           class="card-img-top" 
                           alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Grupo 2 -->
            <div class="carousel-item">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/camara_solar.jpg', 'nombre' => 'Cámara Solar HD Inteligente', 'precio' => 259.00, 'id' => 505],
                  ['img' => 'images/camara_domo_ir.jpg', 'nombre' => 'Cámara Domo IR Interior', 'precio' => 169.00, 'id' => 506],
                  ['img' => 'images/camara_ezviz.jpg', 'nombre' => 'Cámara Ezviz Smart Detection', 'precio' => 229.00, 'id' => 507],
                  ['img' => 'images/camara_ip_noche.jpg', 'nombre' => 'Cámara IP Nocturna 2MP', 'precio' => 199.00, 'id' => 508],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" 
                           class="card-img-top" 
                           alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Controles -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselCamaras" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselCamaras" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Memorias RAM & USB</h2>
    <div class="row align-items-center">
      
      <!-- Imagen lateral izquierda -->
      <div class="col-md-3">
        <img src="{{ asset('images/banner_memorias.jpg') }}" 
             alt="Memorias RAM y USB" 
             class="img-fluid rounded shadow-sm">
      </div>

      <!-- Carrusel -->
      <div class="col-md-9">
        <div id="carouselMemorias" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <!-- Grupo 1 -->
            <div class="carousel-item active">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/ram_adata8g1866.jpg', 'nombre' => 'Memoria RAM ADATA XPG DDR3 8GB/1866', 'precio' => 270.27, 'id' => 341],
                  ['img' => 'images/ram_hx316c10f4az.jpg', 'nombre' => 'Memoria RAM HyperX Fury DDR3 4GB/1600', 'precio' => 171.60, 'id' => 342],
                  ['img' => 'images/ram_hx318c10f8baz.jpg', 'nombre' => 'Memoria RAM HyperX Fury DDR3 8GB/1866', 'precio' => 296.10, 'id' => 344],
                  ['img' => 'images/ram_crucial4g1600.jpg', 'nombre' => 'Memoria SODIMM Crucial DDR3 4GB/1600', 'precio' => 158.73, 'id' => 347],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Grupo 2 -->
            <div class="carousel-item">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/ram_hx318c10f8ne.jpg', 'nombre' => 'Memoria RAM HyperX Fury DDR3 8GB/1866 (HX318C10F8NE)', 'precio' => 304.59, 'id' => 346],
                  ['img' => 'images/ram_king32g.jpg', 'nombre' => 'Memoria USB Kingston 32GB DTSE9G2', 'precio' => 51.91, 'id' => 340],
                  ['img' => 'images/ram_hx316c10f4ne.jpg', 'nombre' => 'Memoria RAM HyperX Fury DDR3 4GB/1600 (HX316C10F4NE)', 'precio' => 171.60, 'id' => 343],
                  ['img' => 'images/ram_hx318c10f8baz2.jpg', 'nombre' => 'Memoria RAM HyperX Fury DDR3 8GB/1866 (HX318C10F8BAZ)', 'precio' => 296.10, 'id' => 345],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Controles -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselMemorias" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselMemorias" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Impresoras Epson</h2>
    <div class="row align-items-center">
      
      <!-- Imagen lateral izquierda -->
      <div class="col-md-3">
        <img src="{{ asset('images/banner_impresoras.jpg') }}" 
             alt="Impresoras Epson" 
             class="img-fluid rounded shadow-sm">
      </div>

      <!-- Carrusel -->
      <div class="col-md-9">
        <div id="carouselImpresorasEpson" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <!-- Grupo 1 -->
            <div class="carousel-item active">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/epson_tmu220a.jpg', 'nombre' => 'Impresora Mini Matricial Epson TM-U220A (C31C515652)', 'precio' => 1514.37, 'id' => 267],
                  ['img' => 'images/epson_tmu220af.jpg', 'nombre' => 'Impresora Mini Matricial Epson TM-U220AF-153 (C31C514653)', 'precio' => 1317.03, 'id' => 269],
                  ['img' => 'images/epson_t20ii.jpg', 'nombre' => 'Impresora Mini Térmica Epson TM-T20II (C31CD52062)', 'precio' => 900.90, 'id' => 274],
                  ['img' => 'images/epson_t20ii_061.jpg', 'nombre' => 'Impresora Mini Térmica Epson TM-T20II-061 (C31CD52061)', 'precio' => 948.93, 'id' => 275],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Grupo 2 -->
            <div class="carousel-item">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/epson_t88v084.jpg', 'nombre' => 'Impresora Mini Térmica Epson TM-T88V-084 (C31CA85084)', 'precio' => 1075.70, 'id' => 276],
                  ['img' => 'images/epson_t88v656.jpg', 'nombre' => 'Impresora Mini Térmica Epson TM-T88V-656 (C31CA85656)', 'precio' => 1167.56, 'id' => 277],
                  ['img' => 'images/epson_t88v934.jpg', 'nombre' => 'Impresora Mini Térmica Epson TM-T88V-934 (C31CA85934)', 'precio' => 1329.93, 'id' => 278],
                  ['img' => 'images/epson_tmu220b.jpg', 'nombre' => 'Impresora Mini Matricial Epson TM-U220B (C31C514667)', 'precio' => 1351.35, 'id' => 268],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Controles -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselImpresorasEpson" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselImpresorasEpson" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold text-center mb-4 text-warning">🖱️ Lo Mejor en Mouse</h2>

    <!-- Botones de pestañas -->
    <div class="text-center mb-4">
      <button class="btn btn-warning mx-2 active" id="btnMouse" onclick="mostrarCarrusel('mouse')">Mouse</button>
      <button class="btn btn-outline-warning mx-2" id="btnMouseGamer" onclick="mostrarCarrusel('mouseGamer')">Mouse Gamer</button>
    </div>

    <!-- Carrusel MOUSE -->
    <div id="carouselMouse" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- Grupo 1 -->
        <div class="carousel-item active">
          <div class="row g-3">
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse1.jpg') }}" class="card-img-top" alt="Mouse básico">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Óptico Genius</h6>
                  <p class="text-success fw-bold">S/ 29.90</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse2.jpg') }}" class="card-img-top" alt="Mouse USB Logitech">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Logitech M90 USB</h6>
                  <p class="text-success fw-bold">S/ 35.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse3.jpg') }}" class="card-img-top" alt="Mouse inalámbrico HP">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse HP Inalámbrico</h6>
                  <p class="text-success fw-bold">S/ 49.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse4.jpg') }}" class="card-img-top" alt="Mouse ergonómico Dell">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Dell Ergonómico</h6>
                  <p class="text-success fw-bold">S/ 39.00</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grupo 2 -->
        <div class="carousel-item">
          <div class="row g-3">
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse5.jpg') }}" class="card-img-top" alt="Mouse inalámbrico Genius">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Genius DX-120</h6>
                  <p class="text-success fw-bold">S/ 42.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse6.jpg') }}" class="card-img-top" alt="Mouse óptico Microsoft">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Microsoft Basic</h6>
                  <p class="text-success fw-bold">S/ 39.90</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse7.jpg') }}" class="card-img-top" alt="Mouse inalámbrico Lenovo">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Lenovo Silent</h6>
                  <p class="text-success fw-bold">S/ 55.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mouse8.jpg') }}" class="card-img-top" alt="Mouse óptico Teros">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Teros Básico</h6>
                  <p class="text-success fw-bold">S/ 25.00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselMouse" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselMouse" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <!-- Carrusel MOUSE GAMER -->
    <div id="carouselMouseGamer" class="carousel slide d-none" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- Grupo 1 -->
        <div class="carousel-item active">
          <div class="row g-3">
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer1.jpg') }}" class="card-img-top" alt="Mouse Gamer RGB">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Gamer RGB Teros X15</h6>
                  <p class="text-success fw-bold">S/ 69.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer2.jpg') }}" class="card-img-top" alt="Mouse Gamer Redragon">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Redragon Cobra</h6>
                  <p class="text-success fw-bold">S/ 119.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer3.jpg') }}" class="card-img-top" alt="Mouse Logitech G203">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Logitech G203 Lightsync</h6>
                  <p class="text-success fw-bold">S/ 149.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer4.jpg') }}" class="card-img-top" alt="Mouse Razer DeathAdder">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Razer DeathAdder V2</h6>
                  <p class="text-success fw-bold">S/ 229.00</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grupo 2 -->
        <div class="carousel-item">
          <div class="row g-3">
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer5.jpg') }}" class="card-img-top" alt="Mouse Gamer HyperX">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse HyperX Pulsefire</h6>
                  <p class="text-success fw-bold">S/ 189.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer6.jpg') }}" class="card-img-top" alt="Mouse Gamer Corsair">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Mouse Corsair Harpoon RGB</h6>
                  <p class="text-success fw-bold">S/ 159.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer7.jpg') }}" class="card-img-top" alt="Mouse Gamer Asus">
                <div class="card-body">
                  <h6 class="card-title fw-bold">Asus TUF Gaming M3</h6>
                  <p class="text-success fw-bold">S/ 139.00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="card h-100 text-center border-0 shadow-sm">
                <img src="{{ asset('images/mousegamer8.jpg') }}" class="card-img-top" alt="Mouse Gamer MSI Clutch">
                <div class="card-body">
                  <h6 class="card-title fw-bold">MSI Clutch GM08</h6>
                  <p class="text-success fw-bold">S/ 179.00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselMouseGamer" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselMouseGamer" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>

<script>
function mostrarCarrusel(tipo) {
  const carruselMouse = document.getElementById('carouselMouse');
  const carruselGamer = document.getElementById('carouselMouseGamer');
  const btnMouse = document.getElementById('btnMouse');
  const btnGamer = document.getElementById('btnMouseGamer');

  if (tipo === 'mouse') {
    carruselMouse.classList.remove('d-none');
    carruselGamer.classList.add('d-none');
    btnMouse.classList.add('btn-warning');
    btnMouse.classList.remove('btn-outline-warning');
    btnGamer.classList.add('btn-outline-warning');
    btnGamer.classList.remove('btn-warning');
  } else {
    carruselMouse.classList.add('d-none');
    carruselGamer.classList.remove('d-none');
    btnGamer.classList.add('btn-warning');
    btnGamer.classList.remove('btn-outline-warning');
    btnMouse.classList.add('btn-outline-warning');
    btnMouse.classList.remove('btn-warning');
  }
}
</script>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Sistemas Continuos</h2>
    <div class="row align-items-center">
      
      <!-- Imagen principal izquierda -->
      <div class="col-md-3">
        <img src="{{ asset('images/banner_sistemas_continuos.jpg') }}" alt="Sistemas Continuos" class="img-fluid rounded shadow-sm">
      </div>

      <!-- Carrusel -->
      <div class="col-md-9">
        <div id="carouselSistemasContinuos" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <!-- Grupo 1 -->
            <div class="carousel-item active">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/tanque_ciss_100ml.jpg', 'nombre' => 'Tanque CISS 100ml Acrílico', 'precio' => 65.00, 'id' => 1],
                  ['img' => 'images/cartuchos_acrilico.jpg', 'nombre' => 'Cartuchos Acrílicos sin Chip', 'precio' => 49.00, 'id' => 2],
                  ['img' => 'images/mangueras_ciss.jpg', 'nombre' => 'Mangueras CISS 4 Colores', 'precio' => 25.00, 'id' => 3],
                  ['img' => 'images/kit_tintas_gospel.jpg', 'nombre' => 'Kit Tintas Gospel Premium 4x100ml', 'precio' => 95.00, 'id' => 4],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Grupo 2 -->
            <div class="carousel-item">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/coditos_tanque.jpg', 'nombre' => 'Coditos y Adaptadores CISS', 'precio' => 15.00, 'id' => 5],
                  ['img' => 'images/adhesivo_ciss.jpg', 'nombre' => 'Adhesivo y Pegatinas CISS', 'precio' => 12.00, 'id' => 6],
                  ['img' => 'images/kit_mantenimiento.jpg', 'nombre' => 'Kit de Mantenimiento CISS', 'precio' => 30.00, 'id' => 7],
                  ['img' => 'images/diagrama_ciss.jpg', 'nombre' => 'Diagrama de Instalación CISS', 'precio' => 10.00, 'id' => 8],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Controles -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselSistemasContinuos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselSistemasContinuos" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Placas Liberadas HP</h2>
    <div class="row align-items-center">

      <!-- Imagen principal izquierda -->
      <div class="col-md-3">
        <img src="{{ asset('images/banner_placas_hp.jpg') }}" alt="Placas Liberadas HP" class="img-fluid rounded shadow-sm">
      </div>

      <!-- Carrusel -->
      <div class="col-md-9">
        <div id="carouselPlacasHP" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <!-- Grupo 1 -->
            <div class="carousel-item active">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/placa_hp_8210.jpg', 'nombre' => 'Placa HP 8210 Liberada', 'precio' => 280.00, 'id' => 9],
                  ['img' => 'images/placa_hp_7740.jpg', 'nombre' => 'Placa HP 7740 Liberada', 'precio' => 300.00, 'id' => 10],
                  ['img' => 'images/placa_hp_9010.jpg', 'nombre' => 'Placa HP 9010 Liberada', 'precio' => 310.00, 'id' => 11],
                  ['img' => 'images/placa_hp_9020.jpg', 'nombre' => 'Placa HP 9020 Liberada', 'precio' => 320.00, 'id' => 12],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Grupo 2 -->
            <div class="carousel-item">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/placa_hp_7720.jpg', 'nombre' => 'Placa HP 7720 Liberada', 'precio' => 290.00, 'id' => 13],
                  ['img' => 'images/placa_hp_8710.jpg', 'nombre' => 'Placa HP 8710 Liberada', 'precio' => 310.00, 'id' => 14],
                  ['img' => 'images/placa_hp_477.jpg', 'nombre' => 'Placa HP PageWide 477', 'precio' => 350.00, 'id' => 15],
                  ['img' => 'images/placa_hp_577.jpg', 'nombre' => 'Placa HP PageWide 577', 'precio' => 360.00, 'id' => 16],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" class="card-img-top" alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Controles -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPlacasHP" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPlacasHP" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Auriculares Gaming</h2>
    <div class="row align-items-center">

      <!-- Imagen lateral izquierda -->
      <div class="col-md-3">
        <img src="{{ asset('images/banner_auriculares.jpg') }}" 
             alt="Auriculares Gaming" 
             class="img-fluid rounded shadow-sm">
      </div>

      <!-- Carrusel -->
      <div class="col-md-9">
        <div id="carouselAuriculares" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <!-- Grupo 1 -->
            <div class="carousel-item active">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/steelseries_350.jpg', 'nombre' => 'Auricular SteelSeries Siberia 350 (HS-00006)', 'precio' => 394.68, 'id' => 423],
                  ['img' => 'images/steelseries_650.jpg', 'nombre' => 'Auricular SteelSeries Siberia 650 (HS-00007)', 'precio' => 733.59, 'id' => 424],
                  ['img' => 'images/steelseries_800.jpg', 'nombre' => 'Auricular SteelSeries Siberia 800 (HS-00007)', 'precio' => 1111.11, 'id' => 425],
                  ['img' => 'images/steelseries_elite.jpg', 'nombre' => 'Auricular SteelSeries Siberia Elite (5152)', 'precio' => 304.59, 'id' => 426],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" 
                           class="card-img-top" 
                           alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Grupo 2 -->
            <div class="carousel-item">
              <div class="row g-3">
                @foreach ([
                  ['img' => 'images/tt_consoleone.jpg', 'nombre' => 'Auricular Thermaltake Console One (HT-SHOOOONE)', 'precio' => 184.47, 'id' => 427],
                  ['img' => 'images/tt_cronos.jpg', 'nombre' => 'Auricular Thermaltake Cronos (HT-CRO008EC)', 'precio' => 184.47, 'id' => 428],
                  ['img' => 'images/tt_cronosgo.jpg', 'nombre' => 'Auricular Thermaltake Cronos Go (HT-CRO009EC)', 'precio' => 141.57, 'id' => 429],
                  ['img' => 'images/tt_level10m.jpg', 'nombre' => 'Auricular Thermaltake Level 10 M (HT-LTM010)', 'precio' => 304.59, 'id' => 430],
                ] as $producto)
                  <div class="col-md-3 col-6">
                    <div class="card h-100 text-center border-0 shadow-sm">
                      <img src="{{ asset($producto['img']) }}" 
                           class="card-img-top" 
                           alt="{{ $producto['nombre'] }}">
                      <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $producto['nombre'] }}</h6>
                        <p class="text-success mb-1 fw-bold">S/ {{ number_format($producto['precio'], 2) }}</p>
                        <a href="{{ route('productos.show', $producto['id']) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-eye"></i> Ver detalles
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <!-- Controles -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselAuriculares" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselAuriculares" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================= -->
<!-- SECCIÓN: ASESOR PERSONALIZADO OPTIMIZADA -->
<!-- ============================================= -->
<section class="py-4 bg-dark text-white">
  <div class="container text-center">
    <h3 class="fw-bold mb-2">Un Asesor Personalizado te está esperando</h3>
    <p class="text-secondary mb-4">por el medio que prefieras</p>

    <div class="row justify-content-center g-3">
      
      <!-- Para Empresas -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="tel:013325311" class="text-decoration-none text-dark">
          <div class="card border-0 shadow-sm h-100 text-dark card-hover">
            <div class="card-body text-center py-4">
              <div class="mb-3 text-warning fs-2">
                <i class="fa fa-phone-alt"></i>
              </div>
              <h6 class="fw-bold">Para Empresas</h6>
              <p class="text-warning mb-1">¡Llámanos!</p>
              <p class="fw-bold mb-0">(01) 332-5311</p>
            </div>
          </div>
        </a>
      </div>

      <!-- WhatsApp -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="https://wa.me/51994009302" target="_blank" class="text-decoration-none text-dark">
          <div class="card border-0 shadow-sm h-100 text-dark card-hover">
            <div class="card-body text-center py-4">
              <div class="mb-3 text-success fs-2">
                <i class="fab fa-whatsapp"></i>
              </div>
              <h6 class="fw-bold">WhatsApp</h6>
              <p class="text-success mb-1">Envíanos un mensaje</p>
              <p class="fw-bold mb-0">994 009 302</p>
            </div>
          </div>
        </a>
      </div>

      <!-- Correo -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="mailto:ventas@sisoft.com.pe" class="text-decoration-none text-dark">
          <div class="card border-0 shadow-sm h-100 text-dark card-hover">
            <div class="card-body text-center py-4">
              <div class="mb-3 text-danger fs-2">
                <i class="fa fa-envelope"></i>
              </div>
              <h6 class="fw-bold">Correo</h6>
              <p class="text-danger mb-1">En breve responderemos</p>
              <p class="fw-bold mb-0">ventas@sisoft.com.pe</p>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- Estilos adicionales -->
<style>
  .card-hover {
    transition: all 0.3s ease-in-out;
  }
  .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(255, 255, 255, 0.15);
  }
  section.bg-dark {
    background-color: #212529 !important;
  }
</style>
@endsection
