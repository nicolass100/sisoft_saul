<!-- ============================================= -->
<!-- FOOTER AZUL Y AMARILLO -->
<!-- ============================================= -->
<footer class="footer-custom text-light pt-5">
  <div class="container pb-4">

    <!-- SUSCRIPCIÓN -->
    <div class="row align-items-center mb-4">
      <div class="col-md-6 d-flex align-items-center mb-3 mb-md-0">
        <i class="fa fa-envelope fs-2 me-3 text-warning"></i>
        <div>
          <h5 class="fw-bold text-warning mb-0">Suscríbete a nuestro Boletín</h5>
          <small class="text-light">Novedades, ofertas y promociones.</small>
        </div>
      </div>
      <div class="col-md-6">
        <form class="d-flex">
          <input type="email" class="form-control me-2" placeholder="Escribe tu correo electrónico">
          <button class="btn btn-warning fw-bold">SUSCRIBIRME</button>
        </form>
      </div>
    </div>

    <hr class="border-light">

    <div class="row">
      <!-- CONTACTO -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold text-warning">CONTÁCTANOS</h6>
        <p class="mb-1"><i class="fa fa-envelope me-2 text-warning"></i> ventas@sisoft.com.pe</p>
        <p class="mb-1"><i class="fa fa-phone me-2 text-warning"></i> Central: (01) 332-5311</p>
        <p class="mb-1"><i class="fab fa-whatsapp me-2 text-warning"></i> WhatsApp: 994 009 302</p>
        <p><i class="fa fa-clock me-2 text-warning"></i> Lunes a Sábado: 10:00 a 20:00</p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="text-warning"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-warning"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-warning"><i class="fab fa-tiktok"></i></a>
          <a href="#" class="text-warning"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <!-- ACERCA DE -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold text-warning">ACERCA DE SISOFT</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">Nosotros</a></li>
          <li><a href="#" class="text-light text-decoration-none">Puntos de Venta</a></li>
          <li><a href="#" class="text-light text-decoration-none">Garantía</a></li>
          <li><a href="#" class="text-light text-decoration-none">Trabaja con Nosotros</a></li>
        </ul>
      </div>

      <!-- ATENCIÓN -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold text-warning">ATENCIÓN AL CLIENTE</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-light text-decoration-none">Preguntas Frecuentes</a></li>
          <li><a href="#" class="text-light text-decoration-none">Formas de Pago</a></li>
          <li><a href="#" class="text-light text-decoration-none">Envíos y Entregas</a></li>
          <li><a href="#" class="text-light text-decoration-none">Cambios y Devoluciones</a></li>
          <li><a href="#" class="text-light text-decoration-none">Términos & Condiciones</a></li>
        </ul>
      </div>

      <!-- PAGOS -->
      <div class="col-md-3 mb-4">
        <h6 class="fw-bold text-warning">MEDIOS DE PAGO</h6>
        <div class="d-flex flex-column gap-1">
          <img src="{{ asset('images/visa.png') }}" alt="Visa" width="80">
          <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard" width="80">
          <img src="{{ asset('images/amex.png') }}" alt="Amex" width="80">
          <img src="{{ asset('images/bcp.png') }}" alt="BCP" width="80">
          <img src="{{ asset('images/yape.png') }}" alt="Yape" width="80">
          <img src="{{ asset('images/plin.png') }}" alt="Plin" width="80">
        </div>
        <small class="text-light mt-2 d-block">Paga en línea de forma rápida y segura.</small>
      </div>
    </div>

    <hr class="border-light mt-4">

    <div class="text-center small text-light pb-3">
      © 2025 <span class="text-warning fw-bold">SISOFT</span> – Negocios Saul. Todos los derechos reservados. <br>
      RUC / Razón social aquí • Hecho con Esfuerzo
    </div>
  </div>
</footer>

<!-- ============================================= -->
<!-- ESTILOS PERSONALIZADOS -->
<!-- ============================================= -->
<style>
  .footer-custom {
    background-color: #002B5B;
  }
  .footer-custom a:hover {
    color: #FFD700 !important;
  }
  .footer-custom hr {
    opacity: 0.2;
  }
  .footer-custom .btn-warning {
    background-color: #FFD700;
    color: #002B5B;
    border: none;
  }
  .footer-custom .btn-warning:hover {
    background-color: #ffcc00;
  }
</style>
