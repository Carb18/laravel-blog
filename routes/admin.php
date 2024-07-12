<?php
// CREANDO ARCHIVO DE RUTA PARA PANEL DE ADMINISTRADOR


use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('admin.dashboard');
})->name('dashboard');

Route::resource('/categories', CategoryController::class);

