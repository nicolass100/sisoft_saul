@extends('layouts.app')

@section('title', 'Catálogo de Productos')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">📦 Catálogo de Productos</h2>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="fw-bold text-success">S/ {{ number_format($producto->precio, 2) }}</p>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">
                            Ver Detalle
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $productos->links() }}
    </div>
</div>
@endsection
