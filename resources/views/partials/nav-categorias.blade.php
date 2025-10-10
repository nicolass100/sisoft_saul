<nav class="bg-primary py-2 shadow-sm sticky-top">
  <div class="container d-flex justify-content-center flex-wrap">
    <ul class="nav text-uppercase fw-semibold">
      <li class="nav-item dropdown mx-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">Laptops</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ url('/productos?q=laptop+asus') }}">Asus</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=laptop+hp') }}">HP</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=laptop+lenovo') }}">Lenovo</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">Computadoras</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ url('/productos?q=pc+armadas') }}">PC Armadas</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=componentes') }}">Componentes</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">Impresoras</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ url('/productos?q=hp') }}">HP</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=epson') }}">Epson</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=brother') }}">Brother</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">Monitores</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ url('/productos?q=monitor+lg') }}">LG</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=monitor+hp') }}">HP</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">Gamer</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ url('/productos?q=mouse+gamer') }}">Mouse Gamer</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=teclado+gamer') }}">Teclado Gamer</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=audifonos+gamer') }}">Audífonos Gamer</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">Venta a Empresas</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ url('/productos?q=corporativo') }}">Corporativo</a></li>
          <li><a class="dropdown-item" href="{{ url('/productos?q=servicios') }}">Servicios</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<style>
  nav.bg-primary {
    background-color: #000080 !important;
    z-index: 1030; /* asegura que quede por encima de todo */
  }
  .nav-link {
    font-size: 0.95rem;
    letter-spacing: 0.3px;
  }
  .dropdown-menu {
    border-radius: 0;
    border: none;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
  }
  .dropdown-item:hover {
    background-color: #0d6efd;
    color: #fff;
  }
</style>
