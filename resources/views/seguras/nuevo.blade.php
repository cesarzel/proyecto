@extends('layout.app')
@section('contenido')

<h1>NUEVA ZONA SEGURA</h1>
<hr style="border:2px solid skyblue">

<form action="{{ route('seguras.store') }}" method="POST">
    @csrf 

    <label><b>Nombre:</b></label><br>
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej. Plaza Central"><br>

    <label><b>Tipo de Seguridad:</b></label><br>
    <select name="tipo_seguridad" id="tipo_seguridad" class="form-control" required>
        <option value="">--- SELECCIONE ---</option>
        <option value="PUBLICA">PÚBLICA</option>
        <option value="PRIVADA">PRIVADA</option>
    </select><br>

    <label><b>Radio (en metros):</b></label><br>
    <input type="number" name="radio" id="radio" class="form-control" placeholder="Ej. 100" required><br>

    <label><b>Coordenadas Centrales:</b></label>
    <div class="row">
        <div class="col-md-6">
            <label><b>Latitud:</b></label>
            <input type="number" name="latitud" id="latitud" class="form-control" readonly>
        </div>
        <div class="col-md-6">
            <label><b>Longitud:</b></label>
            <input type="number" name="longitud" id="longitud" class="form-control" readonly>
        </div>
    </div>
    <br>

    <div id="mapa1" style="height:300px; width:100%; border:2px solid black;"></div>
    <br>

    <button type="submit" class="btn btn-success">Guardar</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-primary" onclick="prepararDatosCirculo();" data-bs-toggle="modal" data-bs-target="#modalGraficoCirculo">
        Graficar Zona
    </button>
    &nbsp;&nbsp;
    <a href="{{ route('seguras.index') }}" class="btn btn-danger">Cancelar</a>
</form>

<!-- MODAL PARA GRÁFICO DEL RADIO -->
<div class="modal fade" id="modalGraficoCirculo" tabindex="-1" aria-labelledby="modalCirculoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCirculoLabel">Rango de Seguridad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div id="mapa-circulo" style="height:300px; width:100%; border:2px solid blue;"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    let mapa, marcador;
    let datosCirculo = null;

    function initMap() {
        const centroInicial = { lat: -0.9374805, lng: -78.6161327 };

        mapa = new google.maps.Map(document.getElementById('mapa1'), {
            center: centroInicial,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        marcador = new google.maps.Marker({
            position: centroInicial,
            map: mapa,
            title: "Ubicación de la zona segura"
        });

        // Inicializar valores
        document.getElementById("latitud").value = centroInicial.lat;
        document.getElementById("longitud").value = centroInicial.lng;

        // Cambiar posición con clic
        mapa.addListener('click', function (event) {
            const clickedLatLng = event.latLng;
            marcador.setPosition(clickedLatLng);
            document.getElementById("latitud").value = clickedLatLng.lat();
            document.getElementById("longitud").value = clickedLatLng.lng();
        });

        // Evento al mostrar el modal (esperar render completo)
        const modal = document.getElementById('modalGraficoCirculo');
        modal.addEventListener('shown.bs.modal', function () {
            if (!datosCirculo) return;

            const centro = new google.maps.LatLng(datosCirculo.lat, datosCirculo.lng);

            const mapaCirculo = new google.maps.Map(document.getElementById('mapa-circulo'), {
                center: centro,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.SATELLITE
            });

            new google.maps.Marker({
                position: centro,
                map: mapaCirculo,
                title: "Centro del círculo"
            });

            new google.maps.Circle({
                strokeColor: "red",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "blue",
                fillOpacity: 0.35,
                map: mapaCirculo,
                center: centro,
                radius: datosCirculo.radio
            });
        });
    }

    function prepararDatosCirculo() {
        const radio = parseFloat(document.getElementById('radio').value);
        const lat = parseFloat(document.getElementById('latitud').value);
        const lng = parseFloat(document.getElementById('longitud').value);

        if (isNaN(radio) || isNaN(lat) || isNaN(lng)) {
            alert("Completa latitud, longitud y radio para graficar.");
            datosCirculo = null;
            return;
        }

        datosCirculo = { lat, lng, radio };
    }
</script>

@endsection
