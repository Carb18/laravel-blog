<?php
// CREANDO ARCHIVO DE RUTA PARA PANEL DE ADMINISTRADOR


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // USANDO VARIABLE DE SESSION SWAL PARA PROBAR ALERTAS
    session()->flash('swal', [
        'icon' => "error",
        'title' => "Oops...",
        'text' => "Something went wrong!",
        'footer' => '<a href="#">Why do I have this issue?</a>'
    ]);

    return view('admin.dashboard');
})->name('admin.dashboard');
