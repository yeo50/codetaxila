<?php

use App\Http\Controllers\AssignmentController;
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
Route::get('/teacherdashboard', [TeacherController::class, 'dashboard'])->middleware(['auth', 'verified', 'student'])
    ->name('teacherdashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('assignments', AssignmentController::class);
});
require __DIR__ . '/auth.php';
