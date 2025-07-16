@extends('layout.app')
@section('contenido')

<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ route('riesgos.store') }}" method="POST">
            @csrf
            <h3><b>Registrar Zona de Riesgo</b></h3>
            <hr>

            <label><b>Nombre:</b></label>
            <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Ej. Zona Roja"><br>

            <label><b>Descripción:</b></label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Detalles de la zona..."></textarea><br>

            <label><b>Nivel de Riesgo:</b></label>
            <select name="nivel_riesgo" class="form-control" required>
                <option value="">-- Seleccione --</option>
                <option value="bajo">Bajo</option>
                <option value="medio">Medio</option>
                <option value="alto">Alto</option>
            </select><br>

            @for($i = 1; $i <= 4; $i++)
            <div class="row">
                <div class="col-md-5">
                    <label><b>COORDENADA N° {{ $i }}</b></label><br>
                    <label>Latitud:</label>
                    <input type="number" name="latitud{{ $i }}" id="latitud{{ $i }}" class="form-control" readonly placeholder="Seleccione..."><br>
                    <label>Longitud:</label>
                    <input type="number" name="longitud{{ $i }}" id="longitud{{ $i }}" class="form-control" readonly placeholder="Seleccione...">
                </div>
                <div class="col-md-7">
                    <div id="mapa{{ $i }}" style="height:180px; width:100%; border:2px solid black;"></div>
                </div>
            </div><br>
            @endfor

            <center>
                <button class="btn btn-success">Guardar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger">Limpiar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-primary" onclick="graficarZona();">Graficar Zona</button>
            </center>
        </form>
    </div>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <div id="mapa-poligono" style="height:500px; width:100%; border:2px solid blue;"></div>
    </div>
</div>

<script type="text/javascript">
    let mapaPoligono;
    const mapas = [];
    const marcadores = [];
    let poligonoZona = null;

    function initMap() {
        const centro = new google.maps.LatLng(-0.9374805, -78.6161327);

        for (let i = 1; i <= 4; i++) {
            const mapa = new google.maps.Map(document.getElementById('mapa' + i), {
                center: centro,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            const marcador = new google.maps.Marker({
                map: mapa,
                position: centro,
                draggable: false
            });

            mapas[i] = mapa;
            marcadores[i] = marcador;

            google.maps.event.addListener(mapa, 'click', function(event) {
                const lat = event.latLng.lat();
                const lng = event.latLng.lng();

                marcadores[i].setPosition(event.latLng);
                document.getElementById(`latitud${i}`).value = lat;
                document.getElementById(`longitud${i}`).value = lng;
            });
        }

        mapaPoligono = new google.maps.Map(document.getElementById("mapa-poligono"), {
            zoom: 15,
            center: centro,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    }

    function graficarZona() {
        const puntos = [];

        for (let i = 1; i <= 4; i++) {
            const lat = parseFloat(document.getElementById(`latitud${i}`).value);
            const lng = parseFloat(document.getElementById(`longitud${i}`).value);

            if (isNaN(lat) || isNaN(lng)) {
                alert(`Falta seleccionar la coordenada ${i}`);
                return;
            }

            puntos.push({ lat, lng });
        }

        if (poligonoZona) {
            poligonoZona.setMap(null); // Borra el polígono anterior si existe
        }

        poligonoZona = new google.maps.Polygon({
            paths: puntos,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#00FF00",
            fillOpacity: 0.35
        });

        poligonoZona.setMap(mapaPoligono);
    }
</script>

@endsection
