<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('cargos_pessoa_juridica', App\Http\Controllers\CargosPessoaJuridicaController::class, []);
    
});
