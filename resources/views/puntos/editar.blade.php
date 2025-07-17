@extends('layout.app')
@section('contenido')

<form action="{{ route('puntos.update', $punto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h1>Editar Punto</h1>

    <label for="nombre"><b>Nombre del Espacio:</b></label><br>
    <input type="text" name="nombre" id="nombre" value="{{ $punto->nombre }}" class="form-control"> <br><br>

    <label for="capacidad"><b>Capacidad:</b></label><br>
    <input type="number" name="capacidad" id="capacidad" value="{{ $punto->capacidad }}" class="form-control"> <br><br>

    <label for="responsable"><b>Responsable:</b></label><br>
    <input type="text" name="responsable" id="responsable" value="{{ $punto->responsable }}" class="form-control"> <br><br>

    <label for="latitud"><b>Latitud:</b></label><br>
    <input type="text" name="latitud" id="latitud" value="{{ $punto->latitud }}" class="form-control"> <br><br>

    <label for="longitud"><b>Longitud:</b></label><br>
    <input type="text" name="longitud" id="longitud" value="{{ $punto->longitud }}" class="form-control"> <br><br>

    <div id="mapa_espacio" style="border:1px solid black; height:300px; width:100%; margin-bottom: 20px;"></div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('puntos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

<script type="text/javascript">
    window.initMap = function () {
        const posicionInicial = { lat: parseFloat({{ $punto->latitud }}), lng: parseFloat({{ $punto->longitud }}) };

        const mapa = new google.maps.Map(document.getElementById("mapa_espacio"), {
            center: posicionInicial,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        let marcador = new google.maps.Marker({
            position: posicionInicial,
            map: mapa,
            draggable: true,
            title: "Arrastra para cambiar la ubicación"
        });

        marcador.addListener('dragend', function () {
            const nuevaPos = marcador.getPosition();
            document.getElementById("latitud").value = nuevaPos.lat().toFixed(6);
            document.getElementById("longitud").value = nuevaPos.lng().toFixed(6);
        });

        // funcionalidad mapa
        mapa.addListener('click', function (e) {
            marcador.setPosition(e.latLng);
            document.getElementById("latitud").value = e.latLng.lat().toFixed(6);
            document.getElementById("longitud").value = e.latLng.lng().toFixed(6);
        });
    };
</script>



@endsection
