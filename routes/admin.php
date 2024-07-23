<?php
// CREANDO ARCHIVO DE RUTA PARA PANEL DE ADMINISTRADOR


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('admin.dashboard');
})->name('dashboard');

Route::resource('/categories', CategoryController::class)
    // Excepcion para la ruta show
->except('show');

Route::resource('/posts', PostController::class)
    // Excepcion para la ruta show
    ->except('show');

