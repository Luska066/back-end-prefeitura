<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('servicos_categoria_perfil', App\Http\Controllers\ServicosCategoriaPerfilController::class, []);
    
});
