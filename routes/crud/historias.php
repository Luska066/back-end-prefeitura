<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('historia', App\Http\Controllers\HistoriumController::class, []);
    
});
