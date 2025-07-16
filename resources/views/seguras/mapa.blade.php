@extends('layout.app')
@section('contenido')

<h2>MAPA DE ZONAS SEGURAS</h2>
<hr style="border:2px solid green">

<div id="mapaZonas" style="height: 600px; width: 100%; border:2px solid black;"></div>

<script type="text/javascript">
    let mapa;

    function initMap() {
        const centroMapa = { lat: -0.9374805, lng: -78.6161327 };

        mapa = new google.maps.Map(document.getElementById('mapaZonas'), {
            center: centroMapa,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        const zonas = @json($seguras);

        zonas.forEach(zona => {
            const centro = new google.maps.LatLng(parseFloat(zona.latitud), parseFloat(zona.longitud));

            // Marcador
            new google.maps.Marker({
                position: centro,
                map: mapa,
                title: zona.nombre
            });

            // Círculo
            new google.maps.Circle({
                strokeColor: "green",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "lightgreen",
                fillOpacity: 0.35,
                map: mapa,
                center: centro,
                radius: parseFloat(zona.radio)
            });
        });
    }
</script>


@endsection
