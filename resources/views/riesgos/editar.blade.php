@extends('layout.app')
@section('contenido')

<div class='row'>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="{{ route('riesgos.update', $riesgo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3><b>Editar Zona de Riesgo</b></h3>
            <hr>

            <label for=""><b>Nombre:</b></label><br>
            <input type="text" name="nombre" id="nombre"
                   class="form-control" value="{{ $riesgo->nombre }}" required><br>

            <label for=""><b>Descripción:</b></label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ $riesgo->descripcion }}</textarea><br>

            <label for=""><b>Nivel de Riesgo:</b></label>
            <select name="nivel_riesgo" class="form-control" required>
                <option value="">-- Seleccione --</option>
                <option value="bajo" {{ $riesgo->nivel_riesgo == 'bajo' ? 'selected' : '' }}>Bajo</option>
                <option value="medio" {{ $riesgo->nivel_riesgo == 'medio' ? 'selected' : '' }}>Medio</option>
                <option value="alto" {{ $riesgo->nivel_riesgo == 'alto' ? 'selected' : '' }}>Alto</option>
            </select><br>

            @for ($i = 1; $i <= 4; $i++)
            <div class="row">
                <div class="col-md-5">
                    <label><b>COORDENADA N° {{ $i }}</b></label><br>
                    <label>Latitud:</label>
                    <input type="number" step="any" name="latitud{{ $i }}" id="latitud{{ $i }}"
                           class="form-control" value="{{ $riesgo->{'latitud'.$i} }}" readonly><br>
                    <label>Longitud:</label>
                    <input type="number" step="any" name="longitud{{ $i }}" id="longitud{{ $i }}"
                           class="form-control" value="{{ $riesgo->{'longitud'.$i} }}" readonly>
                </div>
                <div class="col-md-7">
                    <div id="mapa{{ $i }}" style="height:180px; width:100%; border:2px solid black;"></div>
                </div>
            </div><br>
            @endfor

            <center>
                <button class="btn btn-success">Actualizar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('riesgos.index') }}" class="btn btn-secondary">Cancelar</a>
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

<script>
    let mapaPoligono;
    const mapas = [];
    const marcadores = [];
    let poligonoZona = null;

    function initMap() {
        const centro = { lat: -0.9374805, lng: -78.6161327 };

        for (let i = 1; i <= 4; i++) {
            let lat = parseFloat(document.getElementById(`latitud${i}`).value) || centro.lat;
            let lng = parseFloat(document.getElementById(`longitud${i}`).value) || centro.lng;
            let coord = new google.maps.LatLng(lat, lng);

            const mapa = new google.maps.Map(document.getElementById('mapa' + i), {
                center: coord,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            const marcador = new google.maps.Marker({
                position: coord,
                map: mapa,
                title: `Coordenada ${i}`,
            });

            mapas[i] = mapa;
            marcadores[i] = marcador;

            google.maps.event.addListener(mapa, 'click', function (event) {
                const lat = event.latLng.lat();
                const lng = event.latLng.lng();

                marcador.setPosition(event.latLng);
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
            poligonoZona.setMap(null);
        }

        poligonoZona = new google.maps.Polygon({
            paths: puntos,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#00FF00",
            fillOpacity: 0.35,
        });

        poligonoZona.setMap(mapaPoligono);
    }
</script>

@endsection
