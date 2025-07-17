<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Zonas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 13px; }
        h1, h2 { text-align: center; margin-bottom: 0; }
        .section { margin-top: 20px; }
        .qr { text-align: center; margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 5px; font-size: 12px; }
        th { background-color: #eee; }
        img { display: block; margin: 0 auto; }
    </style>
</head>
<body>
    <h1>Reporte de Zonas y Puntos</h1>
    <h2>Generado por el sistema</h2>

    <div class="section">
        <h3>Puntos de Encuentro</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th><th>Responsable</th><th>Latitud</th><th>Longitud</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $p)
                <tr>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->responsable }}</td>
                    <td>{{ $p->latitud }}</td>
                    <td>{{ $p->longitud }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h3>Zonas de Riesgo</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th><th>Nivel</th><th>Descripción</th><th>Coordenadas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riesgos as $r)
                <tr>
                    <td>{{ $r->nombre }}</td>
                    <td>{{ $r->nivel_riesgo }}</td>
                    <td>{{ $r->descripcion }}</td>
                    <td>
                        ({{ $r->latitud1 }}, {{ $r->longitud1 }}),
                        ({{ $r->latitud2 }}, {{ $r->longitud2 }}),
                        ({{ $r->latitud3 }}, {{ $r->longitud3 }}),
                        ({{ $r->latitud4 }}, {{ $r->longitud4 }})
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h3>Zonas Seguras</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th><th>Tipo</th><th>Radio</th><th>Latitud</th><th>Longitud</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seguras as $s)
                <tr>
                    <td>{{ $s->nombre }}</td>
                    <td>{{ $s->tipo_seguridad }}</td>
                    <td>{{ $s->radio }} m</td>
                    <td>{{ $s->latitud }}</td>
                    <td>{{ $s->longitud }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   @if($mapImageSrc)
    <div class="section">
        <h3>Mapa General</h3>
        <img src="{{ $mapImageSrc }}" alt="Mapa General" width="600">
    </div>
    @endif


    @if(isset($qr))
    <div class="qr">
        <h3>Escanea el código QR para ver el mapa interactivo</h3>
        <img src="data:image/png;base64,{{ $qr }}" alt="QR Code">
        <p>{{ $urlMapa }}</p>
    </div>
    @endif
</body>
</html>
