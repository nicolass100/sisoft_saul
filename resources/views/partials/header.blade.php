<header class="bg-white shadow-sm">
    <div class="container d-flex align-items-center justify-content-between py-3">

        {{-- Logo con enlace a la página principal --}}
<div>
    <a href="{{ route('home') }}" class="d-inline-block">
        <img src="{{ asset('images/logo.jpeg') }}" 
             alt="Logo SISOFT" 
             style="max-height: 70px; cursor: pointer;">
    </a>
</div>

        <!-- Botón Menú -->
<button class="btn btn-primary mx-3 d-flex align-items-center"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#menuOffcanvas"
        aria-controls="menuOffcanvas">
    <i class="fa fa-bars me-2"></i> Menú
</button>

<!-- Offcanvas Menú Lateral -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menuOffcanvas" aria-labelledby="menuOffcanvasLabel">
  <div class="offcanvas-header bg-light border-bottom">
    <h5 class="offcanvas-title fw-bold" id="menuOffcanvasLabel">Menú</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
  </div>

  <div class="offcanvas-body">
    <div class="accordion" id="menuAccordion">

      <!-- Laptops -->
      <div class="accordion-item border-0">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#laptopsCollapse">
           Laptops & Notebooks
          </button>
        </h2>
        <div id="laptopsCollapse" class="accordion-collapse collapse" data-bs-parent="#menuAccordion">
          <div class="accordion-body">
            <a href="{{ url('/productos?q=laptops+asus') }}" class="d-block text-dark text-decoration-none mb-2">Asus</a>
            <a href="{{ url('/productos?q=laptops+hp') }}" class="d-block text-dark text-decoration-none mb-2">HP</a>
            <a href="{{ url('/productos?q=laptops+lenovo') }}" class="d-block text-dark text-decoration-none mb-2">Lenovo</a>
          </div>
        </div>
      </div>

      <!-- Computadoras -->
      <div class="accordion-item border-0">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#pcCollapse">
          Computadoras
          </button>
        </h2>
        <div id="pcCollapse" class="accordion-collapse collapse" data-bs-parent="#menuAccordion">
          <div class="accordion-body">
            <a href="{{ url('/productos?q=pc+armadas') }}" class="d-block text-dark text-decoration-none mb-2">PC Armadas</a>
            <a href="{{ url('/productos?q=componentes') }}" class="d-block text-dark text-decoration-none mb-2">Componentes</a>
          </div>
        </div>
      </div>

      <!-- Gamer -->
      <div class="accordion-item border-0">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#gamerCollapse">
          Gamer
          </button>
        </h2>
        <div id="gamerCollapse" class="accordion-collapse collapse" data-bs-parent="#menuAccordion">
          <div class="accordion-body">
            <a href="{{ url('/productos?q=perifericos+gamer') }}" class="d-block text-dark text-decoration-none mb-2">Periféricos</a>
            <a href="{{ url('/productos?q=accesorios+gamer') }}" class="d-block text-dark text-decoration-none mb-2">Accesorios</a>
          </div>
        </div>
      </div>

      <!-- Impresoras -->
      <div class="accordion-item border-0">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#printerCollapse">
          Impresoras
          </button>
        </h2>
        <div id="printerCollapse" class="accordion-collapse collapse" data-bs-parent="#menuAccordion">
          <div class="accordion-body">
            <a href="{{ url('/productos?q=epson') }}" class="d-block text-dark text-decoration-none mb-2">Epson</a>
            <a href="{{ url('/productos?q=hp') }}" class="d-block text-dark text-decoration-none mb-2">HP</a>
            <a href="{{ url('/productos?q=brother') }}" class="d-block text-dark text-decoration-none mb-2">Brother</a>
          </div>
        </div>
      </div>

      <!-- Venta Empresas -->
      <div class="accordion-item border-0">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#businessCollapse">
          Venta a Empresas
          </button>
        </h2>
        <div id="businessCollapse" class="accordion-collapse collapse" data-bs-parent="#menuAccordion">
          <div class="accordion-body">
            <a href="{{ url('/productos?q=corporativo') }}" class="d-block text-dark text-decoration-none mb-2">Plan Corporativo</a>
            <a href="{{ url('/productos?q=servicios') }}" class="d-block text-dark text-decoration-none mb-2">Servicios Empresariales</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
.offcanvas {
  width: 330px !important;
  transition: all 0.3s ease-in-out;
}
.accordion-button {
  background-color: #f8f9fa;
  border-radius: 0;
  color: #000;
}
.accordion-button:not(.collapsed) {
  background-color: #e9ecef;
  color: #0d6efd;
}
.accordion-body a:hover {
  color: #0d6efd;
}
</style>

        {{-- Barra de búsqueda --}}
        <form class="d-flex flex-grow-1 mx-3" method="GET" action="{{ route('productos.index') }}">
            <input class="form-control me-2" type="search" name="q" placeholder="Busca tu producto..." value="{{ request('q') }}">
            <button class="btn btn-outline-warning" type="submit"><i class="fa fa-search"></i></button>
        </form>

        {{-- Acciones derecha --}}
        <div class="d-flex align-items-center gap-3">
            <span><i class="fa fa-phone"></i> (01) 332-5311</span>
            <span><i class="fab fa-whatsapp"></i> 994 009 302</span>

            @guest
                <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="fa fa-user"></i> Inicia sesión
                </a>
            @else
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold text-primary">Hola, {{ Auth::user()->name }}</span>

                    {{-- Enlace al panel admin --}}
                    <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-dark btn-sm">
                        <i class="fa fa-cogs"></i> Panel Admin
                    </a>

                    {{-- Botón de logout --}}
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link text-dark p-0">
                            <i class="fa fa-sign-out"></i> Cerrar sesión
                        </button>
                    </form>
                </div>
            @endguest

            <a href="{{ route('cart.index') }}" class="text-dark">
                <i class="fa fa-shopping-cart"></i> Carrito
                ({{ count(session('cart', [])) }})
            </a>

            <a href="{{ route('arquitectura') }}" class="btn btn-outline-primary">
                <i class="fa fa-diagram-project"></i> Arquitectura
            </a>
        </div>
    </div>
</header>

{{-- Estilo y script --}}
<style>
.dropdown-menu {
    border-radius: 10px;
    animation: fadeIn 0.2s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

