@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')
@php
  $imgs = collect([
    $producto->imagen,
    $producto->imagen_2,
    $producto->imagen_3,
    $producto->imagen_4,
  ])->filter()->values();
@endphp

<div class="container my-5">
  <div class="row g-4">

    {{-- Galería izquierda --}}
    <div class="col-lg-6 d-flex flex-column align-items-center">
      {{-- Imagen principal --}}
      <div class="mb-3 text-center">
        <img
          id="mainImage"
          src="{{ $imgs->isNotEmpty() ? asset($imgs[0]) : asset('images/no-image.png') }}"
          alt="{{ $producto->nombre }}"
          class="img-fluid rounded shadow-sm"
          style="max-height: 480px; object-fit: contain; cursor: zoom-in;"
          data-index="0"
        >
      </div>

      {{-- Miniaturas --}}
      <div class="d-flex flex-wrap justify-content-center gap-2">
        @foreach ($imgs as $idx => $img)
          <img
            src="{{ asset($img) }}"
            alt="Vista {{ $idx + 1 }}"
            class="img-thumbnail"
            style="width: 95px; height: 95px; object-fit: cover; cursor: pointer;"
            data-index="{{ $idx }}"
            onclick="
              document.getElementById('mainImage').src=this.src;
              document.getElementById('mainImage').dataset.index='{{ $idx }}';
            "
          >
        @endforeach
        @if($imgs->isEmpty())
          <img src="{{ asset('images/no-image.png') }}" class="img-thumbnail" style="width:95px;height:95px;object-fit:cover;">
        @endif
      </div>
    </div>

    {{-- Información del producto --}}
    <div class="col-lg-6">
      <h4 class="fw-bold text-uppercase mb-2">{{ $producto->nombre }}</h4>

      <p><strong>Marca:</strong> {{ $producto->marca ?? 'No especificada' }}</p>
      <p><strong>Modelo:</strong> {{ $producto->modelo ?? 'No disponible' }}</p>
      <p><strong>Categoría:</strong> {{ $producto->categoria ?? 'General' }}</p>
      <p><strong>Código:</strong> {{ $producto->sku ?? 'No disponible' }}</p>

      @if (($producto->oferta ?? 0) > 0)
        <p class="text-danger fw-bold fs-5 mb-3">Precio Oferta: S/ {{ number_format($producto->oferta, 2) }}</p>
      @else
        <p class="text-danger fw-bold fs-5 mb-3">Precio: S/ {{ number_format($producto->precio, 2) }}</p>
      @endif

      <div class="d-flex gap-2">
        <form action="{{ route('cart.add', $producto->id) }}" method="POST" class="d-inline">
  @csrf
  <button type="submit" class="btn btn-warning fw-semibold">
    <i class="fa fa-cart-plus me-1"></i> Añadir al Carrito
  </button>
</form>

        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
          <i class="fa fa-arrow-left me-1"></i> Volver al Catálogo
        </a>
      </div>
    </div>
  </div>
</div>

{{-- ================= LIGHTBOX ================= --}}
<div id="lb-overlay" aria-hidden="true">
  <span id="lb-close" aria-label="Cerrar">&times;</span>
  <img id="lb-img" alt="Vista ampliada">
  <button id="lb-prev" aria-label="Anterior">&#10094;</button>
  <button id="lb-next" aria-label="Siguiente">&#10095;</button>
</div>

<style>
  #lb-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.9);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }
  #lb-overlay.show { display: flex; }

  #lb-img {
    max-width: 90vw;
    max-height: 85vh;
    border-radius: 8px;
    object-fit: contain;
    box-shadow: 0 0 30px rgba(255,255,255,0.3);
  }

  #lb-close {
    position: absolute;
    top: 25px;
    right: 35px;
    font-size: 40px;
    color: white;
    cursor: pointer;
  }

  #lb-prev, #lb-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: white;
    font-size: 48px;
    cursor: pointer;
    user-select: none;
  }
  #lb-prev { left: 40px; }
  #lb-next { right: 40px; }
  #lb-prev:hover, #lb-next:hover, #lb-close:hover { color: #00b4ff; }
</style>

<script>
  (function() {
    const gallery = [
      @foreach($imgs as $img)
        "{{ asset($img) }}",
      @endforeach
    ];

    const main = document.getElementById('mainImage');
    const overlay = document.getElementById('lb-overlay');
    const lbImg = document.getElementById('lb-img');
    const prev = document.getElementById('lb-prev');
    const next = document.getElementById('lb-next');
    const close = document.getElementById('lb-close');

    let currentIndex = 0;

    function openLightbox(i) {
      currentIndex = i;
      lbImg.src = gallery[i];
      overlay.classList.add('show');
    }

    function closeLightbox() {
      overlay.classList.remove('show');
    }

    function showNext() {
      currentIndex = (currentIndex + 1) % gallery.length;
      lbImg.src = gallery[currentIndex];
    }

    function showPrev() {
      currentIndex = (currentIndex - 1 + gallery.length) % gallery.length;
      lbImg.src = gallery[currentIndex];
    }

    // Eventos
    main.addEventListener('click', () => {
      const idx = parseInt(main.dataset.index || '0', 10);
      openLightbox(idx);
    });

    close.addEventListener('click', closeLightbox);
    prev.addEventListener('click', showPrev);
    next.addEventListener('click', showNext);
    overlay.addEventListener('click', e => {
      if (e.target === overlay) closeLightbox();
    });
    document.addEventListener('keydown', e => {
      if (!overlay.classList.contains('show')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'ArrowLeft') showPrev();
    });
  })();
</script>
@endsection
