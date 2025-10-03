@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2>{{ $producto->nombre }}</h2>
            <p>{{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> S/ {{ number_format($producto->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">← Volver</a>
        </div>
    </div>
</div>
@endsection
