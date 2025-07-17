@extends('layout.app')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h2 class="mb-4 text-primary fw-bold">📍 Registrar Nuevo Espacio</h2>

        <form action="{{ route('puntos.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="nombre" class="form-label"><strong>Nombre del Espacio</strong></label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>

            <div class="form-group mb-3">
                <label for="capacidad" class="form-label"><strong>Capacidad</strong></label>
                <input type="number" class="form-control" name="capacidad" id="capacidad" min="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="responsable" class="form-label"><strong>Responsable</strong></label>
                <input type="text" class="form-control" name="responsable" id="responsable" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="latitud" class="form-label"><strong>Latitud</strong></label>
                    <input type="text" class="form-control" name="latitud" id="latitud" readonly>
                </div>
                <div class="col-md-6">
                    <label for="longitud" class="form-label"><strong>Longitud</strong></label>
                    <input type="text" class="form-control" name="longitud" id="longitud" readonly>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label"><strong>Selecciona la ubicación en el mapa:</strong></label>
                <div id="mapa_espacio" style="height: 350px; border: 2px solid #ddd; border-radius: 10px;"></div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4 py-2">
                    <i class="bi bi-save2-fill"></i> Guardar
                </button>
                <a href="{{ route('puntos.index') }}" class="btn btn-outline-secondary px-4 py-2">
                    <i class="bi bi-arrow-left-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Google Maps script -->
<script type="text/javascript">
    let mapa;
    let marcador;

    window.initMap = function () {
        const coordenadasIniciales = { lat: -0.9374805, lng: -78.6161327 };

        // Cargar el mapa
        mapa = new google.maps.Map(document.getElementById("mapa_espacio"), {
            center: coordenadasIniciales,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Crear un marcador en el centro inicial
        marcador = new google.maps.Marker({
            position: coordenadasIniciales,
            map: mapa,
            draggable: true,
            title: "Ubicación seleccionada"
        });

        // Actualizar campos al mover el marcador
        marcador.addListener('dragend', function () {
            const pos = marcador.getPosition();
            document.getElementById("latitud").value = pos.lat().toFixed(6);
            document.getElementById("longitud").value = pos.lng().toFixed(6);
        });

        // Actualizar marcador al hacer clic en el mapa
        mapa.addListener('click', function (event) {
            const clickLocation = event.latLng;
            marcador.setPosition(clickLocation);
            document.getElementById("latitud").value = clickLocation.lat().toFixed(6);
            document.getElementById("longitud").value = clickLocation.lng().toFixed(6);
        });

        // Inicializa valores en los campos con la posición inicial
        document.getElementById("latitud").value = coordenadasIniciales.lat.toFixed(6);
        document.getElementById("longitud").value = coordenadasIniciales.lng.toFixed(6);
    };
</script>



@endsection
