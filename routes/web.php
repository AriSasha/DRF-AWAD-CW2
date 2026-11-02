<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login and logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Everything below needs a logged-in user
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Courses: only admins can add, edit and delete
    Route::middleware('permission:manage courses')->group(function () {
        Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    });

    // Courses: admins, lecturers and students can view
    Route::middleware('permission:manage courses|view courses')->group(function () {
        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    });

    // Students: admins only
    Route::middleware('permission:manage students')->group(function () {
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store');
        Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    });

    // Registrations: admins and students can register
    Route::middleware('permission:manage registrations|register for courses')->group(function () {
        Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
        Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    });

    // Registrations: only admins can edit and delete
    Route::middleware('permission:manage registrations')->group(function () {
        Route::get('/registrations/{registration}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
        Route::put('/registrations/{registration}', [RegistrationController::class, 'update'])->name('registrations.update');
        Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
    });

    // Registrations: everyone with a role can view
    Route::middleware('permission:manage registrations|view registrations')->group(function () {
        Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
        Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    });
});
