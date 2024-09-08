<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('pessoa_juridica', App\Http\Controllers\PessoaJuridicaController::class, []);
    
});
