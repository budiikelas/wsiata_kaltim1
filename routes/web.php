<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('categories', CategoryController::class);
Route::resource('destinations', DestinationController::class);
Route::resource('facilities', FacilityController::class);
Route::post('galleries', [GalleryController::class, 'store']);
Route::delete('galleries/{id}', [GalleryController::class, 'destroy']);
Route::post('reviews', [ReviewController::class, 'store'])->middleware('auth');


Route::get('/', function () {
    return view('landing');
});

Route::get('/packages', function () {
    return view('packages');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/admin', function () {
    return view('admin');
});
