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
Route::resource('categories', CategoryController::class);
Route::resource('destinations', DestinationController::class);
Route::resource('facilities', FacilityController::class);
Route::post('galleries', [GalleryController::class, 'store']);
Route::delete('galleries/{id}', [GalleryController::class, 'destroy']);
Route::post('reviews', [ReviewController::class, 'store'])->middleware('auth');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
