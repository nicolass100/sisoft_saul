<header class="bg-white shadow-sm">
    <div class="container d-flex align-items-center justify-content-between py-3">
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="Logo SISOFT" style="max-height: 70px;">
        </div>
        <form class="d-flex flex-grow-1 mx-3" method="GET" action="{{ route('productos.index') }}">
            <input class="form-control me-2" type="search" name="q" placeholder="Busca tu producto..." value="{{ request('q') }}">
            <button class="btn btn-outline-warning" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="d-flex align-items-center gap-3">
            <span><i class="fa fa-phone"></i> (01) 332-5311</span>
            <span><i class="fab fa-whatsapp"></i> 994 009 302</span>
            <a href="#" class="text-dark"><i class="fa fa-user"></i> Inicia sesión</a>
            <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i> Carrito (0)</a>
            {{-- Nuevo enlace --}}
            <a href="{{ route('arquitectura') }}" class="btn btn-outline-primary">
                <i class="fa fa-diagram-project"></i> Arquitectura
            </a>
        </div>
    </div>
</header>
