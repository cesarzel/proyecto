@extends('layout.app')
@section('contenido')

<h1>EDITAR ZONA SEGURA</h1>
<hr style="border:2px solid skyblue">

<form action="{{ route('seguras.update', $segura->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label><b>Nombre:</b></label><br>
    <input type="text" name="nombre" id="nombre" class="form-control"
           value="{{ $segura->nombre }}" required><br>

    <label><b>Tipo de Seguridad:</b></label><br>
    <select name="tipo_seguridad" id="tipo_seguridad" class="form-control" required>
        <option value="PUBLICA" {{ $segura->tipo_seguridad == 'PUBLICA' ? 'selected' : '' }}>ZONA PÚBLICA</option>
        <option value="PRIVADA" {{ $segura->tipo_seguridad == 'PRIVADA' ? 'selected' : '' }}>ZONA PRIVADA</option>
    </select><br>

    <label><b>Radio (en metros):</b></label><br>
    <input type="number" name="radio" id="radio" class="form-control"
           value="{{ $segura->radio }}" required><br>

    <label><b>Coordenadas Centrales:</b></label>
    <div class="row">
        <div class="col-md-6">
            <label><b>Latitud:</b></label>
            <input type="number" name="latitud" id="latitud"
                   class="form-control" value="{{ $segura->latitud }}" readonly>
        </div>
        <div class="col-md-6">
            <label><b>Longitud:</b></label>
            <input type="number" name="longitud" id="longitud"
                   class="form-control" value="{{ $segura->longitud }}" readonly>
        </div>
    </div>
    <br>

    <div id="mapa1" style="height:300px; width:100%; border:2px solid black;"></div>
    <br>

    <button type="submit" class="btn btn-success">Actualizar</button>
    &nbsp;&nbsp;
    <a href="{{ route('seguras.index') }}" class="btn btn-danger">Cancelar</a>
</form>

<script type="text/javascript">
    let mapa;
    let marcador;

    function initMap() {
        const lat = parseFloat(document.getElementById('latitud').value) || -0.9374805;
        const lng = parseFloat(document.getElementById('longitud').value) || -78.6161327;
        const centro = { lat: lat, lng: lng };

        mapa = new google.maps.Map(document.getElementById('mapa1'), {
            center: centro,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        marcador = new google.maps.Marker({
            position: centro,
            map: mapa,
            title: "Ubicación de la zona segura",
        });

        mapa.addListener('click', function (event) {
            const latLng = event.latLng;

            marcador.setPosition(latLng);

            document.getElementById("latitud").value = latLng.lat();
            document.getElementById("longitud").value = latLng.lng();
        });
    }
</script>

@endsection
