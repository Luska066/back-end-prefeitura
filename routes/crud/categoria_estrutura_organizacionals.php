<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('categ_est_organizacional', App\Http\Controllers\CategoriaEstruturaOrganizacionalController::class, []);

});
