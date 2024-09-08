<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('estrutura', App\Http\Controllers\EstruturaController::class, []);
    
});
