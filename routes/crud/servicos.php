<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('servicos', App\Http\Controllers\ServicoController::class, []);
    
});
