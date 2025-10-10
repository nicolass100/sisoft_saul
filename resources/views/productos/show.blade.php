@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')
<div class="container py-5">
  <div class="row g-4">
    <!-- Miniaturas -->
    <div class="col-md-2 d-flex flex-column align-items-center">
      @php
        $imagenes = [
          asset('images/'.$producto->imagen),
          asset('images/'.$producto->imagen),
          asset('images/'.$producto->imagen),
          asset('images/'.$producto->imagen),
        ];
      @endphp
      @foreach($imagenes as $index => $img)
        <img src="{{ $img }}" 
             class="img-thumbnail mb-2 thumb-img" 
             data-img="{{ $img }}" 
             alt="Vista lateral {{ $index + 1 }}">
      @endforeach
    </div>

    <!-- Imagen principal + formas de pago -->
    <div class="col-md-5 text-center">
      <img id="mainImage" src="{{ asset('images/'.$producto->imagen) }}" 
           class="img-fluid rounded shadow-sm main-img" 
           alt="{{ $producto->nombre }}">
      <p class="text-muted small mt-2 mb-3">*Imágenes referenciales*</p>

      <!-- Formas de pago -->
      <div class="border-top pt-3">
        <h6 class="fw-bold mb-3">
          <i class="fa fa-credit-card me-2 text-primary"></i>Formas de Pago Disponibles
        </h6>
        <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
          <img src="{{ asset('images/BBVA.png') }}" height="35" alt="BBVA">
          <img src="{{ asset('images/bcp.png') }}" height="35" alt="BCP">
          <img src="{{ asset('images/Interbank.png') }}" height="35" alt="Interbank">
          <img src="{{ asset('images/Scotiabank.png') }}" height="35" alt="Scotiabank">
          <img src="{{ asset('images/VISA.png') }}" height="35" alt="Visa">
        </div>
        <p class="small text-muted mt-2 mb-0">
          Depósito, transferencia o tarjeta de crédito/débito
        </p>
      </div>
    </div>

    <!-- Detalles del producto -->
    <div class="col-md-5">
      <h4 class="fw-bold text-uppercase">{{ $producto->nombre }}</h4>
      <p class="text-muted mb-2">Oferta en efectivo, transferencia o depósito</p>

      <h5 class="text-danger fw-bold mb-3">
        Precio Oferta: <span class="text-dark">S/ {{ number_format($producto->precio, 2) }}</span>
      </h5>

      <div class="product-info mb-3">
        <p><strong>Marca:</strong> <span>{{ $producto->marca ?? 'No especificada' }}</span></p>
        <p><strong>Modelo:</strong> <span>{{ $producto->modelo ?? 'No disponible' }}</span></p>
        <p><strong>Categoría:</strong> <span>{{ $producto->categoria ?? 'General' }}</span></p>
        <p><strong>Código:</strong> <span>{{ $producto->sku }}</span></p>
      </div>

      <!-- Botones -->
      <div class="d-flex gap-2 mb-4">
        <form action="{{ route('cart.add', $producto->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-warning btn-sm px-4 fw-bold">
            <i class="fa fa-cart-plus me-1"></i> Añadir al Carrito
          </button>
        </form>
        <a href="{{ route('productos.index') }}" class="btn btn-outline-dark btn-sm px-4">
          <i class="fa fa-arrow-left me-1"></i> Volver al Catálogo
        </a>
      </div>
    </div>
  </div>

  <!-- Tabs de descripción -->
  <div class="mt-5 border-top pt-4">
    <ul class="nav nav-tabs justify-content-center mb-3" id="productTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="descripcion-tab" data-bs-toggle="tab" data-bs-target="#descripcion" type="button" role="tab">Descripción</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ficha-tab" data-bs-toggle="tab" data-bs-target="#ficha" type="button" role="tab">Ficha Técnica</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="garantia-tab" data-bs-toggle="tab" data-bs-target="#garantia" type="button" role="tab">Garantías</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contacto-tab" data-bs-toggle="tab" data-bs-target="#contacto" type="button" role="tab">Contáctanos</button>
      </li>
    </ul>

    <div class="tab-content text-center" id="productTabContent">
      <div class="tab-pane fade show active" id="descripcion" role="tabpanel">
        <p>{{ $producto->descripcion ?? 'Sin descripción disponible para este producto.' }}</p>
      </div>
      <div class="tab-pane fade" id="ficha" role="tabpanel">
        <p>Detalles técnicos próximamente...</p>
      </div>
      <div class="tab-pane fade" id="garantia" role="tabpanel">
        <p>Todos nuestros productos cuentan con garantía del fabricante.</p>
      </div>
      <div class="tab-pane fade" id="contacto" role="tabpanel">
        <p>¿Tienes dudas? Contáctanos para más información sobre este producto.</p>
      </div>
    </div>
  </div>
</div>

<!-- Lightbox -->
<div id="lightbox" class="lightbox">
  <span class="close-lightbox">&times;</span>
  <img class="lightbox-content" id="lightbox-img">
</div>
@endsection

@push('styles')
<style>
.product-info p {
  margin-bottom: 4px;
  font-size: 0.95rem;
}
.product-info strong {
  color: #111;
  width: 120px;
  display: inline-block;
}
.btn-sm {
  border-radius: 6px;
  transition: all 0.2s ease;
}
.btn-warning.btn-sm {
  background-color: #ffcc00;
  border: none;
  color: #000;
}
.btn-warning.btn-sm:hover {
  background-color: #e6b800;
}
.btn-outline-dark.btn-sm:hover {
  background-color: #111;
  color: #fff;
}
.nav-tabs .nav-link {
  color: #333;
  font-weight: 500;
  border: none;
  transition: all 0.2s ease;
}
.nav-tabs .nav-link.active {
  color: #ff6600;
  border-bottom: 3px solid #ff6600;
}
.nav-tabs .nav-link:hover {
  color: #ff6600;
}
.img-thumbnail {
  cursor: pointer;
  transition: transform 0.2s ease;
}
.img-thumbnail:hover {
  transform: scale(1.05);
}
.main-img {
  transition: opacity 0.3s ease;
}

/* LIGHTBOX */
.lightbox {
  display: none;
  position: fixed;
  z-index: 1050;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.9);
  justify-content: center;
  align-items: center;
}
.lightbox-content {
  max-width: 80%;
  max-height: 80%;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(255,255,255,0.2);
}
.close-lightbox {
  position: absolute;
  top: 30px;
  right: 50px;
  color: white;
  font-size: 40px;
  cursor: pointer;
}
.close-lightbox:hover {
  color: #ff6600;
}
</style>
@endpush

@push('scripts')
<script>
// Cambiar imagen principal
document.querySelectorAll('.thumb-img').forEach(img => {
  img.addEventListener('click', function() {
    const main = document.getElementById('mainImage');
    main.style.opacity = '0';
    setTimeout(() => {
      main.src = this.dataset.img;
      main.style.opacity = '1';
    }, 200);
  });
});

// Lightbox
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');
const closeBtn = document.querySelector('.close-lightbox');

document.getElementById('mainImage').addEventListener('click', function() {
  lightbox.style.display = 'flex';
  lightboxImg.src = this.src;
});

closeBtn.addEventListener('click', () => {
  lightbox.style.display = 'none';
});

lightbox.addEventListener('click', (e) => {
  if (e.target === lightbox) lightbox.style.display = 'none';
});

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') lightbox.style.display = 'none';
});
</script>
@endpush
