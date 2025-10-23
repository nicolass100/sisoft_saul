@extends('layouts.app')

@section('title', 'Mi Carrito')

@section('content')
<div class="container py-4">

  <h2 class="mb-4 text-center fw-bold">
    <i class="fa fa-shopping-cart text-warning"></i> Mi Carrito
  </h2>

  @if(count($cart) > 0)
  <div class="table-responsive shadow-sm rounded bg-white p-3">
    <table class="table table-striped align-middle mb-0">
      <thead class="table-dark">
        <tr>
          <th scope="col">Imagen</th>
          <th scope="col">Producto</th>
          <th scope="col">Precio</th>
          <th scope="col" style="width:120px;">Cantidad</th>
          <th scope="col">Total</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cart as $id => $item)
        <tr>
          <td style="width:120px;">
            <img src="{{ asset($item['imagen'] ?? 'images/no-image.png') }}"
                 alt="{{ $item['nombre'] }}"
                 class="img-fluid rounded shadow-sm"
                 style="width:90px; height:90px; object-fit:contain;">
          </td>

          <td class="fw-semibold">{{ $item['nombre'] }}</td>
          <td class="text-danger fw-bold">S/ {{ number_format($item['precio'], 2) }}</td>

          <td>
            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
              @csrf
              <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="form-control text-center me-2" style="width:70px;">
              <button type="submit" class="btn btn-sm btn-warning" title="Actualizar cantidad">
                <i class="fa fa-sync"></i>
              </button>
            </form>
          </td>

          <td class="fw-bold">S/ {{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>

          <td>
            <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto del carrito?');">
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Eliminar
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @php
    $subtotal = collect($cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);
    $igv = $subtotal * 0.18;
    $total = $subtotal + $igv;
    $telefono = "51987654321"; // ⚠️ Reemplázalo con tu número de WhatsApp (sin +)

    // ✅ Datos del usuario logueado (si existe)
    $nombreUsuario = Auth::check() ? Auth::user()->name : 'Cliente no registrado';
    $correoUsuario = Auth::check() ? Auth::user()->email : 'Sin correo';

    // ✅ Construcción del mensaje de WhatsApp
    $mensaje = "¡Hola! Quiero confirmar mi pedido:%0A%0A";
    foreach ($cart as $item) {
        $mensaje .= "🖨️ *{$item['nombre']}* - Cant: {$item['cantidad']} - S/ " . number_format($item['precio'] * $item['cantidad'], 2) . "%0A";
    }
    $mensaje .= "%0A*Subtotal:* S/ " . number_format($subtotal, 2);
    $mensaje .= "%0A*IGV (18%):* S/ " . number_format($igv, 2);
    $mensaje .= "%0A*Total:* S/ " . number_format($total, 2);
    $mensaje .= "%0A%0A👤 *Cliente:* $nombreUsuario";
    $mensaje .= "%0A✉️ *Correo:* $correoUsuario";
    $mensaje .= "%0A%0A📦 Método de entrega: Envío / Tienda";
    $mensaje .= "%0A💳 Método de pago: Efectivo / Transferencia";
    $mensaje .= "%0A%0A📞 Mi nombre completo es: ___________________";
  @endphp

  {{-- Bloque resumen --}}
  <div class="row mt-4">
    <div class="col-md-6 col-lg-4 ms-auto">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <h5 class="fw-bold mb-3 text-center">Resumen de Compra</h5>
          <div class="d-flex justify-content-between border-bottom py-1">
            <span>Subtotal:</span>
            <span>S/ {{ number_format($subtotal, 2) }}</span>
          </div>
          <div class="d-flex justify-content-between border-bottom py-1">
            <span>IGV (18%):</span>
            <span>S/ {{ number_format($igv, 2) }}</span>
          </div>
          <div class="d-flex justify-content-between fw-bold fs-5 mt-2">
            <span>Total:</span>
            <span class="text-danger">S/ {{ number_format($total, 2) }}</span>
          </div>

          {{-- Botones --}}
          <div class="mt-4 d-grid gap-2">
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
              <i class="fa fa-arrow-left"></i> Seguir comprando
            </a>

            <a href="https://wa.me/{{ $telefono }}?text={{ $mensaje }}" 
               target="_blank" 
               class="btn btn-success fw-bold">
              <i class="fab fa-whatsapp"></i> Proceder al pago por WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @else
  <div class="alert alert-info text-center">
    <i class="fa fa-info-circle"></i> Tu carrito está vacío.
  </div>
  <div class="text-center mt-3">
    <a href="{{ route('productos.index') }}" class="btn btn-primary">
      <i class="fa fa-shopping-bag"></i> Ir al catálogo
    </a>
  </div>
  @endif
</div>

{{-- 🔹 Botón flotante de WhatsApp global --}}
<a href="https://wa.me/{{ $telefono }}?text=¡Hola!%20Estoy%20interesado%20en%20sus%20impresoras%20y%20servicios."
   class="whatsapp-float"
   target="_blank"
   title="Contáctanos por WhatsApp">
   <i class="fab fa-whatsapp"></i>
</a>

<style>
  .whatsapp-float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 25px;
      right: 25px;
      background-color: #25d366;
      color: #fff;
      border-radius: 50%;
      text-align: center;
      font-size: 30px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.25);
      z-index: 999;
      transition: all 0.3s ease;
  }
  .whatsapp-float:hover {
      background-color: #1ebe57;
      transform: scale(1.1);
      color: #fff;
  }
  .whatsapp-float i {
      margin-top: 15px;
  }
</style>
@endsection
