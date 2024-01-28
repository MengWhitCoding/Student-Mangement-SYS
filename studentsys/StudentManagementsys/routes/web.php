<?php

use App\Http\Controllers\BatchesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('layout',);
    });
    Route::get('/home', function () {
        return view('home');
    });

    Route::resource('/students', StudentController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource('/batches', BatchesController::class);
    Route::resource('/enrollment', EnrollmentController::class);
    Route::resource('/payment', PaymentController::class);
    Route::get('/report/report1/{id}', [ReportController::class,'report1']);
    Route::get('/search', [PaymentController::class,'search']);
    Route::get('/search', [StudentController::class,'search']);
    Route::get('/search', [TeacherController::class,'search']);
    Route::get('/search', [CourseController::class,'search']);

    Route::get('/search', [EnrollmentController::class,'search']);
    Route::get('/search', [BatchesController::class,'search']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
