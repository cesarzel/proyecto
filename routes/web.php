<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\SeguraController;

Route::get('/', function () {
    return view('welcome');
});



// habilitar una ruta especifica para el mapa 
Route::get('/puntos/mapa',[PuntoController::class,'mapa']);
Route::get('/riesgos/mapa', [RiesgoController::class, 'mapa'])->name('riesgos.mapa');
Route::get('seguras/mapa', [SeguraController::class, 'mapa'])->name('seguras.mapa');



//habilitando acceso al controlador 
Route::resource('puntos',PuntoController::class);
Route::resource('riesgos', RiesgoController::class);
Route::resource('seguras', SeguraController::class);

Route::get('/punto/template', function () {
    return view('puntos.mytemplate');
});