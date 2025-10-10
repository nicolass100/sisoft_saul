<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">
          <i class="fa fa-user"></i> Inicia sesión
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label">Recordarme</label>
          </div>
          <div class="d-flex justify-content-between">
            <a href="#">¿Olvidaste tu contraseña?</a>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-sign-in-alt"></i> Entrar
            </button>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <small class="text-muted">¿No tienes cuenta?
          <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Regístrate aquí</a>
        </small>
      </div>
    </div>
  </div>
</div>
