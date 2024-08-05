<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureRole;
use App\Http\Middleware\EnsureStudent;
use App\Models\Assignment;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified', 'role'])
    ->name('dashboard');
Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->middleware(['auth', 'verified', 'teacher'])
    ->name('teacherdashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('assignments', AssignmentController::class)->middleware('teacher');

    Route::resource('enrolls', EnrollController::class);
    Route::get('do-assignment', [AssignmentController::class, 'doAssignment'])->middleware('student')->name('doAssignment');

    Route::get('/courses/intro', [CourseController::class, 'intro'])->name('courses.intro');
    Route::get('/courses/frontend', [CourseController::class, 'frontend'])->name('courses.frontend');
    Route::get('/courses/backend', [CourseController::class, 'backend'])->name('courses.backend');
    Route::resource('courses', CourseController::class)->middleware('teacher');
    Route::resource('grades', GradeController::class);
    Route::resource('progresses', ProgressController::class);
    // Route::get('/learn-html-topic', [CourseController::class, 'learnHtmlTopic'])->name('learnHtmlTopic');
    Route::get('/learn-css-topic', [CourseController::class, 'learnCssTopic'])->name('learnCssTopic');
});
require __DIR__ . '/auth.php';
