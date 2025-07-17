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
        $urlMapa = route('mapa.general');

        $qr = base64_encode(QrCode::format('png')->size(150)->generate($urlMapa));

        $pdf = Pdf::loadView('reportes.zonas', compact('puntos', 'riesgos', 'seguras', 'urlMapa', 'qr'));

        return $pdf->download('Reporte_Zonas.pdf');
    }
}
