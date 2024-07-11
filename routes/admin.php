
<?php
// CREANDO ARCHIVO DE RUTA PARA PANEL DE ADMINISTRADOR


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Testing admin route";
});
