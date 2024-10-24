<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('noticias', App\Http\Controllers\NoticiaController::class, []);

});
