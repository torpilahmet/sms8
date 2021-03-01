<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//User Management All Routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('view');
    });
});

