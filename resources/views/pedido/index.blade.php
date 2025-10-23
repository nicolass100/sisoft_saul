@extends('layouts.app')

@section('title', 'Finalizar Pedido')

@section('content')
<div class="container py-5">
  <h2 class="text-center fw-bold mb-4">
    <i class="fa fa-credit-card"></i> Finalizar Pedido
  </h2>

  {{-- Mostrar carrito resumen --}}
  <div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white fw-bold">
      🛒 Resumen de tu compra
    </div>
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead class="table-light">
          <tr>
            <th>Producto</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart as $item)
            <tr>
              <td>{{ $item['nombre'] }}</td>
              <td class="text-center">{{ $item['cantidad'] }}</td>
              <td class="text-center">S/ {{ number_format($item['precio'], 2) }}</td>
              <td class="text-center">S/ {{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          @php
            $subtotal = collect($cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);
            $igv = $subtotal * 0.18;
            $total = $subtotal + $igv;
          @endphp
          <tr class="fw-bold">
            <td colspan="3" class="text-end">Subtotal:</td>
            <td class="text-center">S/ {{ number_format($subtotal, 2) }}</td>
          </tr>
          <tr class="fw-bold">
            <td colspan="3" class="text-end">IGV (18%):</td>
            <td class="text-center">S/ {{ number_format($igv, 2) }}</td>
          </tr>
          <tr class="fw-bold text-danger">
            <td colspan="3" class="text-end">Total:</td>
            <td class="text-center">S/ {{ number_format($total, 2) }}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  {{-- Formulario de datos del cliente --}}
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">
      <i class="fa fa-user"></i> Datos del Cliente
    </div>
    <div class="card-body">
      <form action="{{ route('pedido.store') }}" method="POST">
        @csrf

        <div class="row g-3">
          <div class="col-md-6">
            <label for="nombre" class="form-label fw-bold">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="correo" class="form-label fw-bold">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="telefono" class="form-label fw-bold">Teléfono / WhatsApp</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="direccion" class="form-label fw-bold">Dirección (opcional)</label>
            <input type="text" name="direccion" id="direccion" class="form-control">
          </div>

          <div class="col-md-6">
            <label for="metodo_envio" class="form-label fw-bold">Método de envío</label>
            <select name="metodo_envio" id="metodo_envio" class="form-select" required>
              <option value="">Selecciona una opción</option>
              <option value="retiro_tienda">Retiro en tienda</option>
              <option value="envio_domicilio">Envío a domicilio</option>
            </select>
          </div>

          <div class="col-md-6">
            <label for="metodo_pago" class="form-label fw-bold">Método de pago</label>
            <select name="metodo_pago" id="metodo_pago" class="form-select" required>
              <option value="">Selecciona una opción</option>
              <option value="transferencia_bancaria">Transferencia bancaria</option>
              <option value="yape_plin">Yape / Plin</option>
              <option value="tarjeta">Tarjeta (Visa / Mastercard)</option>
              <option value="contra_entrega">Pago contra entrega</option>
            </select>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-success btn-lg px-5">
            <i class="fa fa-check-circle"></i> Confirmar Pedido
          </button>
          <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary btn-lg px-4 ms-2">
            <i class="fa fa-arrow-left"></i> Volver al carrito
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection