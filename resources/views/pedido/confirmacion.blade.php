@extends('layouts.app')

@section('title', 'Pedido Confirmado')

@section('content')
<div class="container py-5 text-center">
  <h2 class="fw-bold text-success mb-3">
    <i class="fa fa-check-circle"></i> ¡Pedido registrado correctamente!
  </h2>
  <p class="mb-4">
    Gracias <strong>{{ $pedido['cliente']['nombre'] }}</strong>, tu pedido fue registrado el <strong>{{ $pedido['fecha'] }}</strong>.
  </p>

  <div class="card shadow-sm mx-auto" style="max-width: 600px;">
    <div class="card-body">
      <h5 class="fw-bold text-primary mb-3">Resumen del pedido</h5>
      <p><strong>Código:</strong> {{ $pedido['codigo'] }}</p>
      <p><strong>Total:</strong> S/ {{ number_format($pedido['total'], 2) }}</p>
      <p><strong>Envío:</strong> {{ ucfirst(str_replace('_', ' ', $pedido['cliente']['metodo_envio'])) }}</p>
      <p><strong>Pago:</strong> {{ ucfirst(str_replace('_', ' ', $pedido['cliente']['metodo_pago'])) }}</p>
    </div>
  </div>

  <div class="mt-4">
    <a href="{{ route('productos.index') }}" class="btn btn-outline-primary">
      <i class="fa fa-home"></i> Volver al catálogo
    </a>
  </div>
</div>
@endsection
