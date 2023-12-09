<?php

use App\Http\Controllers\AnimeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('animes', [AnimeController::class, 'getAllAnimes']);
Route::get('animes/{id}', [AnimeController::class, 'getAnime']);
Route::post('animes', [AnimeController::class, 'createAnime']);
Route::put('animes/{id}', [AnimeController::class, 'updateAnime']);
Route::delete('animes/{id}', [AnimeController::class, 'deleteAnime']);

