<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use App\Models\Riesgo;
use App\Models\Segura;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReportePDFController extends Controller
{
    public function generarReporte()
    {
        $puntos = Punto::all();
        $riesgos = Riesgo::all();
        $seguras = Segura::all();

        // URL del mapa interactivo
        $urlMapa = route('mapa.general');

        // Generar código QR
        $qr = base64_encode(QrCode::format('png')->size(150)->generate($urlMapa));

        // Configurar Static Maps API
        $apiKey = config('services.google_maps.key');
        $center = '-0.9374805,-78.6161327';
        $zoom = 13;
        $size = '600x300';
        $mapUrl = "https://maps.googleapis.com/maps/api/staticmap?center=$center&zoom=$zoom&size=$size&maptype=roadmap";

        // Colores para niveles de riesgo
        $colores = [
            'BAJO' => '0x00FF00',
            'MEDIO' => '0xFFFF00',
            'ALTO' => '0xFF0000',
        ];

        // Agregar polígonos de riesgo
        foreach ($riesgos as $r) {
            $color = $colores[strtoupper($r->nivel_riesgo)] ?? '0xCCCCCC';
            $coords = [
                "{$r->latitud1},{$r->longitud1}",
                "{$r->latitud2},{$r->longitud2}",
                "{$r->latitud3},{$r->longitud3}",
                "{$r->latitud4},{$r->longitud4}",
                "{$r->latitud1},{$r->longitud1}", // cerrar polígono
            ];
            $mapUrl .= "&path=color:$color|weight:2|fillcolor:{$color}33|" . implode('|', $coords);
        }

        // Agregar marcadores de puntos
        foreach ($puntos as $p) {
            $mapUrl .= "&markers=color:blue|label:P|{$p->latitud},{$p->longitud}";
        }

        // Agregar marcadores de zonas seguras
        foreach ($seguras as $s) {
            $color = $s->tipo_seguridad === 'PUBLICA' ? 'green' : 'purple';
            $mapUrl .= "&markers=color:$color|label:S|{$s->latitud},{$s->longitud}";
        }

        // Añadir clave de API
        $mapUrl .= "&key=$apiKey";

        // Obtener imagen del mapa y convertirla a base64
        try {
            $mapImage = base64_encode(file_get_contents($mapUrl));
            $mapImageSrc = 'data:image/png;base64,' . $mapImage;
        } catch (\Exception $e) {
            $mapImageSrc = null; // en caso de error, evita romper el PDF
        }

        // Cargar vista PDF
        $pdf = Pdf::loadView('reportes.zonas', compact(
            'puntos',
            'riesgos',
            'seguras',
            'urlMapa',
            'qr',
            'mapImageSrc'
        ));

        return $pdf->download('Reporte_Zonas.pdf');
    }
}
