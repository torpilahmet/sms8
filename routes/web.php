<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
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

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->name('admin.')->group(function () {


//User Management All Routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/profile', [UserController::class, 'UserProfile'])->name('profile');
        Route::get('/view', [UserController::class, 'UserView'])->name('view');
        Route::get('/add', [UserController::class, 'UserAdd'])->name('add');
        Route::post('/add', [UserController::class, 'UserStore'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('update');
        Route::delete('/{id}', [UserController::class, 'UserDestroy'])->name('delete');
    });

    Route::prefix('profiles')->name('profiles.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'ProfileView'])->name('profile');
        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('edit');
        Route::post('/update/{id}', [ProfileController::class, 'ProfileUpdate'])->name('update');
    });

    Route::prefix('setups')->group(function () {
        Route::get('class/view', [StudentClassController::class, 'ViewStudentClass'])->name('class.view');
        Route::get('class/add', [StudentClassController::class, 'AddStudentClass'])->name('class.add');
        Route::post('class/add', [StudentClassController::class, 'StoreStudentClass'])->name('class.store');
        Route::get('class/edit/{id}', [StudentClassController::class, 'EditStudentClass'])->name('class.edit');
        Route::post('class/update/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('class.update');
        Route::delete('class/{id}', [StudentClassController::class, 'DestroyStudentClass'])->name('class.delete');

        Route::get('year/view', [StudentYearController::class, 'ViewStudentYear'])->name('years.view');
        Route::get('year/add', [StudentYearController::class, 'AddStudentYear'])->name('years.add');
        Route::post('year/add', [StudentYearController::class, 'StoreStudentYear'])->name('years.store');
        Route::get('year/edit/{id}', [StudentYearController::class, 'EditStudentYear'])->name('years.edit');
        Route::post('year/update/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('years.update');
        Route::delete('year/{id}', [StudentYearController::class, 'DestroyStudentYear'])->name('years.delete');

        Route::get('group/view', [StudentGroupController::class, 'ViewStudentGroup'])->name('groups.view');
        Route::get('group/add', [StudentGroupController::class, 'AddStudentGroup'])->name('groups.add');
        Route::post('group/add', [StudentGroupController::class, 'StoreStudentGroup'])->name('groups.store');
        Route::get('group/edit/{id}', [StudentGroupController::class, 'EditStudentGroup'])->name('groups.edit');
        Route::post('group/update/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('groups.update');
        Route::delete('group/{id}', [StudentGroupController::class, 'DestroyStudentGroup'])->name('groups.delete');

    });
});

