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


use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/packages', function () {
    return view('packages');
});

Route::get('/detail', function () {
    return view('detail');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'admin']);
