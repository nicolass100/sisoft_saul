@extends('layouts.app')

@section('title', 'Detalle del Pedido')

@section('content')
<div class="container py-5">
  <a href="{{ route('admin.pedidos.index') }}" class="btn btn-outline-secondary mb-3">
    <i class="fa fa-arrow-left"></i> Volver
  </a>

  <div class="card shadow-sm">
    <div class="card-header bg-dark text-white fw-bold">
      Pedido #{{ $pedido->codigo }}
    </div>
    <div class="card-body">
      <h5 class="fw-bold mb-3">Información del cliente</h5>
      <ul class="list-group mb-3">
        <li class="list-group-item"><b>Nombre:</b> {{ $pedido->nombre }}</li>
        <li class="list-group-item"><b>Correo:</b> {{ $pedido->correo }}</li>
        <li class="list-group-item"><b>Teléfono:</b> {{ $pedido->telefono }}</li>
        <li class="list-group-item"><b>Dirección:</b> {{ $pedido->direccion ?? 'No especificada' }}</li>
      </ul>

      <h5 class="fw-bold mb-3">Detalles del pedido</h5>
      <ul class="list-group mb-3">
        <li class="list-group-item"><b>Método de envío:</b> {{ ucfirst($pedido->metodo_envio) }}</li>
        <li class="list-group-item"><b>Método de pago:</b> {{ ucfirst($pedido->metodo_pago) }}</li>
        <li class="list-group-item"><b>Total:</b> <span class="fw-bold text-success">S/ {{ number_format($pedido->total, 2) }}</span></li>
        <li class="list-group-item"><b>Fecha de registro:</b> {{ $pedido->created_at->format('d/m/Y H:i:s') }}</li>
      </ul>

      <div class="text-center">
        <button onclick="window.print()" class="btn btn-outline-primary">
          <i class="fa fa-print"></i> Imprimir
        </button>
      </div>
    </div>
  </div>
</div>
@endsection