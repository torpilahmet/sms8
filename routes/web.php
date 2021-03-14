<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
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
        Route::post('class/store', [StudentClassController::class, 'StoreStudentClass'])->name('class.store');
        Route::get('class/edit/{id}', [StudentClassController::class, 'EditStudentClass'])->name('class.edit');
        Route::post('class/update/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('class.update');
        Route::delete('class/{id}', [StudentClassController::class, 'DestroyStudentClass'])->name('class.delete');

        Route::get('year/view', [StudentYearController::class, 'ViewStudentYear'])->name('years.view');
        Route::get('year/add', [StudentYearController::class, 'AddStudentYear'])->name('years.add');
        Route::post('year/store', [StudentYearController::class, 'StoreStudentYear'])->name('years.store');
        Route::get('year/edit/{id}', [StudentYearController::class, 'EditStudentYear'])->name('years.edit');
        Route::post('year/update/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('years.update');
        Route::delete('year/{id}', [StudentYearController::class, 'DestroyStudentYear'])->name('years.delete');

        Route::get('group/view', [StudentGroupController::class, 'ViewStudentGroup'])->name('groups.view');
        Route::get('group/add', [StudentGroupController::class, 'AddStudentGroup'])->name('groups.add');
        Route::post('group/store', [StudentGroupController::class, 'StoreStudentGroup'])->name('groups.store');
        Route::get('group/edit/{id}', [StudentGroupController::class, 'EditStudentGroup'])->name('groups.edit');
        Route::post('group/update/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('groups.update');
        Route::delete('group/{id}', [StudentGroupController::class, 'DestroyStudentGroup'])->name('groups.delete');

        Route::get('shift/view', [StudentShiftController::class, 'ViewStudentShift'])->name('shifts.view');
        Route::get('shift/add', [StudentShiftController::class, 'AddStudentShift'])->name('shifts.add');
        Route::post('shift/store', [StudentShiftController::class, 'StoreStudentShift'])->name('shifts.store');
        Route::get('shift/edit/{id}', [StudentShiftController::class, 'EditStudentShift'])->name('shifts.edit');
        Route::post('shift/update/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('shifts.update');
        Route::delete('shift/{id}', [StudentShiftController::class, 'DestroyStudentShift'])->name('shifts.delete');


        Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.categories.view');
        Route::get('fee/category/add', [FeeCategoryController::class, 'AddFeeCategory'])->name('fee.categories.add');
        Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('fee.categories.store');
        Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'EditFeeCategory'])->name('fee.categories.edit');
        Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFeeCategory'])->name('fee.categories.update');
        Route::delete('fee/category/{id}', [FeeCategoryController::class, 'DestroyFeeCategory'])->name('fee.categories.delete');

        Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amounts.view');
        Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amounts.add');
        Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('fee.amounts.store');
        Route::get('fee/amount/edit/{id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amounts.edit');
        Route::post('fee/amount/update/{id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('fee.amounts.update');
        Route::get('fee/amount/details/{id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amounts.details');

        Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.types.view');
        Route::get('exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.types.add');
        Route::post('exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('exam.types.store');
        Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.types.edit');
        Route::post('exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('exam.types.update');
        Route::delete('exam/type/{id}', [ExamTypeController::class, 'DestroyExamType'])->name('exam.types.delete');

        Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subjects.view');
        Route::get('school/subject/add', [SchoolSubjectController::class, 'AddSchoolSubject'])->name('school.subjects.add');
        Route::post('school/subject/store', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('school.subjects.store');
        Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'EditSchoolSubject'])->name('school.subjects.edit');
        Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('school.subjects.update');
        Route::delete('school/subject/{id}', [SchoolSubjectController::class, 'DestroySchoolSubject'])->name('school.subjects.delete');

        Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subjects.view');
        Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subjects.add');
        Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('assign.subjects.store');
        Route::get('assign/subject/edit/{id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subjects.edit');
        Route::post('assign/subject/update/{id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('assign.subjects.update');
        Route::get('assign/subject/details/{id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subjects.details');

        Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designations.view');
        Route::get('designation/add', [DesignationController::class, 'AddDesignation'])->name('designations.add');
        Route::post('designation/store', [DesignationController::class, 'StoreDesignation'])->name('designations.store');
        Route::get('designation/edit/{id}', [DesignationController::class, 'EditDesignation'])->name('designations.edit');
        Route::post('designation/update/{id}', [DesignationController::class, 'UpdateDesignation'])->name('designations.update');
        Route::delete('designation/{id}', [DesignationController::class, 'DestroyDesignation'])->name('designations.delete');
    });
});

