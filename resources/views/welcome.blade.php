<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a SISOFT_SAUL</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #001F4D, #003D99);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .btn-warning {
            font-weight: 600;
            border-radius: 25px;
            padding: 10px 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn-warning:hover {
            background-color: #ffcc00;
            color: #001F4D;
            transform: translateY(-2px);
        }

        .logo {
            max-width: 140px;
            margin-bottom: 20px;
        }

        .footer {
            position: absolute;
            bottom: 15px;
            color: #c9d7f0;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <img src="{{ asset('images/logo.png') }}" alt="Logo SISOFT" class="logo">
    <h1 class="fw-bold mb-3">Bienvenido a <span class="text-warning">SISOFT_SAUL</span></h1>
    <p class="lead mb-4">Explora nuestro catálogo de productos y descubre las mejores soluciones tecnológicas.</p>

    <a href="{{ route('home') }}" class="btn btn-warning btn-lg">
        <i class="fa fa-store me-2"></i> Entrar al Sitio
    </a>

    <div class="footer">
        &copy; {{ date('Y') }} SISOFT_SAUL · Desarrollado en Laravel
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
