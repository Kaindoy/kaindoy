<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;

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

Route::get('/', function () {
	return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
	Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
	Route::get('index-view', [AdminController::class, 'indexView'])->name('view');
});

Route::group(['middleware' => 'user', 'prefix' => 'user'], function () {
	Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
});
