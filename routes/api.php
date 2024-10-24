<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/estrutura-organizacional')->group(function () {
    Route::get('', [\App\Http\Controllers\API\V1\EstruturaOrganizacional::class, 'getAll']);
    Route::get('filters', [\App\Http\Controllers\API\V1\EstruturaOrganizacional::class, 'getFilters']);
    Route::get('/{id}', [\App\Http\Controllers\API\V1\EstruturaOrganizacional::class, 'getById']);
})->middleware('client');

Route::prefix('/gabinete')->group(function () {
    Route::get('/prefeito', [\App\Http\Controllers\API\V1\EstruturaOrganizacional::class, 'gabinetePrefeito']);
    Route::get('/vice-prefeito', [\App\Http\Controllers\API\V1\EstruturaOrganizacional::class, 'gabineteVicePrefeito']);
})->middleware('client');

Route::prefix('/transparencia')->group(function () {
    Route::get('', [\App\Http\Controllers\API\V1\PortalTransparencia::class, 'index']);
    Route::get('filters', [\App\Http\Controllers\API\V1\PortalTransparencia::class, 'filters']);
})->middleware('client');

Route::prefix('/servicos')->group(function () {
    Route::get('', [\App\Http\Controllers\API\V1\PortalServicos::class, 'getAll']);
    Route::get('filters', [\App\Http\Controllers\API\V1\PortalServicos::class, 'getFiltersPerfilAndCategoria']);
})->middleware('client');

Route::prefix('/cidade')->group(function () {
    Route::get('historia', [\App\Http\Controllers\API\V1\ACidade::class, 'getHistory']);
    Route::get('filters', [\App\Http\Controllers\API\V1\PortalServicos::class, 'getFiltersPerfilAndCategoria']);
})->middleware('client');

// Route::prefix('/noticias')->group(function () {
//     // Route::get('', [\App\Http\Controllers\API\V1\Noticias::class, 'getAll']);
//     Route::get('', [\App\Http\Controllers\API\V1\Noticias::class, 'firtsNoticias']);
//     Route::get('/{uuid}', [\App\Http\Controllers\API\V1\Noticias::class, 'uuidNoticia']);
//     Route::get('noticias', [\App\Http\Controllers\API\V1\Noticias::class, 'tituloNoticia']);

//     Route::get('filters', [\App\Http\Controllers\API\V1\Noticias::class, 'getFiltersCategorias']);
// })->middleware('client');

Route::prefix('/noticias')->group(function () {
    Route::get('', [\App\Http\Controllers\API\V1\Noticias::class, 'firstNoticias']);
    Route::get('/{uuid}', [\App\Http\Controllers\API\V1\Noticias::class, 'uuidNoticia']);
    Route::get('filters', [\App\Http\Controllers\API\V1\Noticias::class, 'getFiltersCategorias']);
})->middleware('client');
