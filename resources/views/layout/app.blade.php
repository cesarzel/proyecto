<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geo 2</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Google Maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoJovMIpUACl_dHHWdthfT5n9PIUskRn8=&libraries=places&callback=initMap"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
  <!-- Encabezado mejorado con Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <!-- Logo o título -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <i class="bi bi-geo-alt-fill me-2"></i> GeoTracker 2.0
        </a>

        <!-- Botón para colapsar en móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Enlaces del menú -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Izquierda -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('clientes.index') }}">
                        <i class="bi bi-house-door-fill"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.create') }}">
                        <i class="bi bi-person-plus-fill"></i> Agregar Cliente
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('clientes/mapa') }}">
                        <i class="bi bi-map-fill"></i> Ver Mapa
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('predios.index') }}">
                        <i class="bi bi-house-door-fill"></i> Predios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('predios/create') }}">
                        <i class="bi bi-map-fill"></i> Registrar Predio
                    </a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('alarmas.index') }}">
                        <i class="bi bi-house-door-fill"></i> Alarmas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('alarmas/create')}}">
                        <i class="bi bi-house-door-fill"></i> Crear Alarma
                    </a>
                </li>
            </ul>

            <!-- Derecha -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Cuenta
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Registrarse</a></li>
                        <li><a class="dropdown-item" href="#">Iniciar Sesión</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenedor principal -->
<div class="container mt-4">
        @yield('contenido')
    </div>

    <!-- Footer dividido en columnas -->
    <footer class="bg-dark text-white mt-5 pt-4 pb-3">
        <div class="container">
            <div class="row">

                <!-- Columna izquierda -->
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> Salcedo, Ecuador</p>
                    <p class="mb-1"><i class="bi bi-envelope-fill"></i> contacto@empresa.com</p>
                    <p><i class="bi bi-telephone-fill"></i> +593 999 999 999</p>
                </div>

                <!-- Columna del medio -->
                <div class="col-md-4 text-center">
                    <h5>Síguenos</h5>
                    <a href="https://wa.me/593999999999" target="_blank" class="text-success mr-3">
                        <i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://facebook.com/tuempresa" target="_blank" class="text-primary mr-3">
                        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="https://instagram.com/tuempresa" target="_blank" class="text-danger mr-3">
                        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="mailto:contacto@empresa.com" class="text-white">
                        <i class="bi bi-envelope-fill" style="font-size: 1.5rem;"></i>
                    </a>
                </div>

                <!-- Columna derecha -->
                <div class="col-md-4 text-md-right text-center">
                    <h5>Cuenta</h5>
                    <a href="#" class="text-white d-block">Iniciar sesión</a>
                    <a href="#" class="text-white d-block">Registrarse</a>
                    <a href="#" class="text-white d-block">Recuperar contraseña</a>
                </div>
            </div>

            <hr class="border-secondary mt-4">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Tu Empresa. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
