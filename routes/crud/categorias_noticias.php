<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('categorias_noticias', App\Http\Controllers\CategoriasNoticiasController::class);
});