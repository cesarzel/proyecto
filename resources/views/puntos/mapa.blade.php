@extends('layout.app')
@section('contenido')
<br>
<h1>Mapa de Espacios</h1>
<br>
<div id="mapa-espacios" style="border:2px solid black; height:500px; width:100%;"></div>

<!-- define la función antes de cargar Google Maps -->
<script>
    window.initMap = function () {
        const coordenadaInicial = new google.maps.LatLng(-0.9374805, -78.6161327);
        const mapa = new google.maps.Map(document.getElementById('mapa-espacios'), {
            center: coordenadaInicial,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        @foreach($puntos as $punto)
            const marcador = new google.maps.Marker({
                position: new google.maps.LatLng({{ $punto->latitud }}, {{ $punto->longitud }}),
                map: mapa,
                icon: {
                    url: "https://cdn-icons-png.flaticon.com/512/854/854878.png",
                    scaledSize: new google.maps.Size(50, 50),
                    anchor: new google.maps.Point(25, 50)
                },
                title: "{{ $punto->nombre }} - Capacidad: {{ $punto->capacidad }} - Responsable: {{ $punto->responsable }}",
                draggable: false
            });
        @endforeach
    }
</script>
@endsection
