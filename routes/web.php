<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LandingController;

// =====================
// Public Routes
// =====================
Route::get('/', [LandingController::class, 'index'])->name('home');

// Detail destinasi (PUBLIC, biar user bisa lihat)
Route::get('/detail/{id}', [DestinationController::class, 'show'])
    ->name('destinations.detail');

// =====================
// Authentication
// =====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// =====================
// Protected Routes
// =====================
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Pages
    Route::get('/packages', function () {
        return view('packages');
    });

    // Resource Management (CRUD)
    Route::resource('categories', CategoryController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('facilities', FacilityController::class);

    Route::post('galleries', [GalleryController::class, 'store']);
    Route::delete('galleries/{id}', [GalleryController::class, 'destroy']);

    Route::post('reviews', [ReviewController::class, 'store']);

    // =====================
    // Admin Routes
    // =====================
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/destinations', [\App\Http\Controllers\AdminController::class, 'destinations'])
            ->name('admin.destinations');
    });
});
