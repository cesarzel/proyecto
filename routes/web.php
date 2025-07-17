<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\ReportePDFController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\SeguraController;
use App\Models\Punto;
use App\Models\Riesgo;
use App\Models\Segura;

Route::get('/', function () {
    return view('login');
});



Route::get('/mapa-general', function () {
    $puntos = Punto::all();
    $riesgos = Riesgo::all();
    $seguras = Segura::all();
    return view('mapa_general', compact('puntos', 'riesgos', 'seguras'));
})->name('mapa.general');



// habilitar una ruta especifica para el mapa 
Route::get('/puntos/mapa',[PuntoController::class,'mapa']);
Route::get('/riesgos/mapa', [RiesgoController::class, 'mapa'])->name('riesgos.mapa');
Route::get('/seguras/mapa', [SeguraController::class, 'mapa'])->name('seguras.mapa');



//habilitando acceso al controlador 
Route::resource('puntos',PuntoController::class);
Route::resource('riesgos', RiesgoController::class);
Route::resource('seguras', SeguraController::class);

Route::get('/punto/template', function () {
    return view('puntos.mytemplate');
});

Route::get('/reporte/pdf', [ReportePDFController::class, 'generarReporte'])->name('reporte.pdf');




Route::get('/login', [AutenticacionController::class, 'showLogin'])->name('login');
Route::post('/login', [AutenticacionController::class, 'login']);

Route::get('/register', [AutenticacionController::class, 'showRegister'])->name('register');
Route::post('/register', [AutenticacionController::class, 'register']);

Route::post('/logout', [AutenticacionController::class, 'logout'])->name('logout');
