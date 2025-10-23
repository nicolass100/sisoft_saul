@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center fw-bold">Catálogo de Productos</h2>

    <!-- 🔍 Barra de búsqueda y filtros -->
    <form action="{{ route('productos.index') }}" method="GET" class="row g-2 mb-4 align-items-center">
        <div class="col-md-4">
            <input type="text" name="buscar" value="{{ request('buscar') }}" 
                   class="form-control" placeholder="Buscar por nombre o SKU...">
        </div>

        <div class="col-md-3">
            <select name="marca" class="form-select">
                <option value="">-- Todas las marcas --</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca }}" {{ request('marca') == $marca ? 'selected' : '' }}>
                        {{ $marca }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="categoria" class="form-select">
                <option value="">-- Todas las categorías --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria }}" {{ request('categoria') == $categoria ? 'selected' : '' }}>
                        {{ $categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-1 d-grid">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Buscar
            </button>
        </div>

        <div class="col-md-1 d-grid">
            <a href="{{ route('productos.index', ['ofertas' => true]) }}" 
               class="btn btn-danger">
                <i class="fa fa-fire"></i> Ver solo ofertas
            </a>
        </div>
    </form>

    <!-- 🛒 Catálogo -->
    <div class="row">
        @forelse ($productos as $producto)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if($producto->imagen)
    <img src="{{ asset($producto->imagen) }}" 
         class="card-img-top rounded-top" 
         alt="{{ $producto->nombre }}" 
         style="height:220px; object-fit:cover;">
@else
    <img src="{{ asset('images/no-image.png') }}" 
         class="card-img-top rounded-top" 
         alt="Sin imagen">
@endif

                    <div class="card-body d-flex flex-column text-center">
                        <h6 class="card-title fw-bold mb-2" style="font-size: 0.95rem;">
                            {{ Str::limit($producto->nombre, 50) }}
                        </h6>
                        <p class="text-muted small mb-2">
                            {{ Str::limit($producto->descripcion ?? 'Sin descripción', 60) }}
                        </p>
                        <p class="fw-bold text-success mb-3">S/ {{ number_format($producto->precio, 2) }}</p>
                        
                        <a href="{{ route('productos.show', $producto->id) }}" 
                           class="btn btn-outline-primary btn-sm mb-2">
                           <i class="fa fa-eye"></i> Ver detalles
                        </a>

                        <form action="{{ route('cart.add', $producto->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-warning text-dark w-100 fw-bold">
                                <i class="fa fa-cart-plus"></i> Agregar al carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No hay productos disponibles en este momento.</p>
        @endforelse
    </div>

    <!-- 🔸 Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $productos->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
