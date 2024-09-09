<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('servico_categoria_perfil', App\Http\Controllers\ServicosCategoriaPerfilController::class, []);

});
