<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">
          <i class="fa fa-user-plus"></i> Crear cuenta
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-user-plus"></i> Registrarse
            </button>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <small class="text-muted">¿Ya tienes cuenta?
          <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Inicia sesión</a>
        </small>
      </div>
    </div>
  </div>
</div>
