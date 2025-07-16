@extends('layout.app')
@section('contenido')

<div class="container mt-4">
    <h3><b>📍 Mapa de Zonas de Riesgo</b></h3>
    <hr>
    <div id="mapaZonas" style="height: 600px; width: 100%; border: 3px solid black;"></div>
</div>

<script type="text/javascript">
    let mapaZonas;

    window.initMap = function () {
        const centro = { lat: -0.9374805, lng: -78.6161327 };

        mapaZonas = new google.maps.Map(document.getElementById("mapaZonas"), {
            center: centro,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        @foreach($riesgos as $riesgo)
            const coords = [
                { lat: parseFloat({{ $riesgo->latitud1 }}), lng: parseFloat({{ $riesgo->longitud1 }}) },
                { lat: parseFloat({{ $riesgo->latitud2 }}), lng: parseFloat({{ $riesgo->longitud2 }}) },
                { lat: parseFloat({{ $riesgo->latitud3 }}), lng: parseFloat({{ $riesgo->longitud3 }}) },
                { lat: parseFloat({{ $riesgo->latitud4 }}), lng: parseFloat({{ $riesgo->longitud4 }}) }
            ];

            const colorRelleno = {
                bajo: "#7FFF7F",
                medio: "#FFF777",
                alto: "#FF7F7F"
            }[`{{ $riesgo->nivel_riesgo }}`] || "#CCCCCC";

            const poligono = new google.maps.Polygon({
                paths: coords,
                strokeColor: "#000000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: colorRelleno,
                fillOpacity: 0.4
            });

            poligono.setMap(mapaZonas);

            const info = new google.maps.InfoWindow({
                content: `<strong>{{ $riesgo->nombre }}</strong><br>
                          Riesgo: <b>{{ ucfirst($riesgo->nivel_riesgo) }}</b><br>
                          {{ $riesgo->descripcion }}`
            });

            // Mostrar información al hacer clic en el polígono
            google.maps.event.addListener(poligono, 'click', function (event) {
                info.setPosition(event.latLng);
                info.open(mapaZonas);
            });
        @endforeach
    };
</script>

@endsection
