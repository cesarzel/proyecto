@extends('layout.app')
@section('contenido')

<h2>MAPA GENERAL DE ZONAS</h2>
<hr style="border:2px solid green">

{{-- Filtros --}}
<div class="mb-3">
    <label><input type="checkbox" class="filtro" data-tipo="punto" checked> Mostrar Puntos</label>
    <label><input type="checkbox" class="filtro" data-tipo="riesgo" data-nivel="BAJO" checked> Riesgo Bajo</label>
    <label><input type="checkbox" class="filtro" data-tipo="riesgo" data-nivel="MEDIO" checked> Riesgo Medio</label>
    <label><input type="checkbox" class="filtro" data-tipo="riesgo" data-nivel="ALTO" checked> Riesgo Alto</label>
    <label><input type="checkbox" class="filtro" data-tipo="segura" data-categoria="PUBLICA" checked> Segura Pública</label>
    <label><input type="checkbox" class="filtro" data-tipo="segura" data-categoria="PRIVADA" checked> Segura Privada</label>
</div>

<div id="mapaZonas" style="height: 600px; width: 100%; border:2px solid black;"></div>

<script type="text/javascript">
    let mapa;
    let marcadores = [], poligonos = [], circulos = [];

    function initMap() {
        const centroMapa = { lat: -0.9374805, lng: -78.6161327 };

        mapa = new google.maps.Map(document.getElementById('mapaZonas'), {
            center: centroMapa,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Puntos de encuentro
        const puntos = @json($puntos);
        puntos.forEach(p => {
            const marcador = new google.maps.Marker({
                position: { lat: parseFloat(p.latitud), lng: parseFloat(p.longitud) },
                map: mapa,
                title: p.nombre
            });
            marcadores.push(marcador);
        });

        // Zonas de riesgo (polígonos)
        const riesgos = @json($riesgos);
        riesgos.forEach(r => {
            const coords = [
                { lat: parseFloat(r.latitud1), lng: parseFloat(r.longitud1) },
                { lat: parseFloat(r.latitud2), lng: parseFloat(r.longitud2) },
                { lat: parseFloat(r.latitud3), lng: parseFloat(r.longitud3) },
                { lat: parseFloat(r.latitud4), lng: parseFloat(r.longitud4) }
            ];
            const color = {
                BAJO: '#7FFF7F',
                MEDIO: '#FFF777',
                ALTO: '#FF7F7F'
            }[r.nivel_riesgo.toUpperCase()] || '#CCCCCC';

            const poligono = new google.maps.Polygon({
                paths: coords,
                strokeColor: '#000000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color,
                fillOpacity: 0.4,
                map: mapa
            });

            poligonos.push({
                obj: poligono,
                tipo: 'riesgo',
                nivel: r.nivel_riesgo.toUpperCase()
            });
        });

        // Zonas seguras (círculos)
        const seguras = @json($seguras);
        seguras.forEach(s => {
            const color = {
                PUBLICA: '#4A90E2',
                PRIVADA: '#9B59B6'
            }[s.tipo_seguridad.toUpperCase()] || '#AAAAAA';

            const circulo = new google.maps.Circle({
                center: { lat: parseFloat(s.latitud), lng: parseFloat(s.longitud) },
                radius: parseFloat(s.radio),
                strokeColor: '#000000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color,
                fillOpacity: 0.3,
                map: mapa
            });

            circulos.push({
                obj: circulo,
                tipo: 'segura',
                categoria: s.tipo_seguridad.toUpperCase()
            });
        });

        // Escuchar filtros
        document.querySelectorAll('.filtro').forEach(chk => {
            chk.addEventListener('change', aplicarFiltros);
        });
    }

    function aplicarFiltros() {
        const activos = Array.from(document.querySelectorAll('.filtro')).filter(c => c.checked);

        // Mostrar/ocultar puntos
        marcadores.forEach(m => {
            m.setMap(activos.some(a => a.dataset.tipo === 'punto') ? mapa : null);
        });

        // Mostrar/ocultar zonas de riesgo
        poligonos.forEach(p => {
            const visible = activos.some(a =>
                a.dataset.tipo === 'riesgo' && a.dataset.nivel === p.nivel
            );
            p.obj.setMap(visible ? mapa : null);
        });

        // Mostrar/ocultar zonas seguras
        circulos.forEach(c => {
            const visible = activos.some(a =>
                a.dataset.tipo === 'segura' && a.dataset.categoria === c.categoria
            );
            c.obj.setMap(visible ? mapa : null);
        });
    }
</script>
@endsection