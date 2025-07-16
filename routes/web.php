<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;

Route::get('/', function () {
    return view('welcome');
});



// habilitar una ruta especifica para el mapa 
Route::get('/puntos/mapa',[PuntoController::class,'mapa']);


//habilitando acceso al controlador 
Route::resource('puntos',PuntoController::class);

Route::get('/punto/template', function () {
    return view('puntos.mytemplate');
});