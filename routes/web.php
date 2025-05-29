<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// ADMIN Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('index-view', [AdminController::class, 'indexView'])->name('index-view');
    Route::resource('users', UserManagementController::class)->except(['create', 'edit', 'show']);
    Route::resource('reservations', ReservationController::class)->only(['index']);
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::resource('reservations', App\Http\Controllers\ReservationController::class);

});

// USER Routes
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    // Add more user routes here
});
