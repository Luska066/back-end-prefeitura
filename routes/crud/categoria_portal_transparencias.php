<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('categ_portal_transparencia', App\Http\Controllers\CategoriaPortalTransparenciumController::class, []);

});
