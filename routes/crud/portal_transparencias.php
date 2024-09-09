<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('portal_transparencia', App\Http\Controllers\PortalTransparenciumController::class, []);
    
});
