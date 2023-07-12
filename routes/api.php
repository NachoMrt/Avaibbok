<?php

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// CREAR ALOJAMIENTO
Route::post('/user/{user_id}/accommodations', [App\Http\Controllers\AccommodationController::class, 'store']);
// ACTUALIZAR alojamiento
Route::put('/user/{user_id}/accommodations/{id}', [App\Http\Controllers\AccommodationController::class, 'update']);
// OBTENER alojamiento
Route::get('/user/{user_id}/accommodations', [App\Http\Controllers\AccommodationController::class, 'index']);
