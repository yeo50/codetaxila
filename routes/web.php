<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserController;
use App\Models\Assignment;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('assignments', AssignmentController::class);;
});
require __DIR__ . '/auth.php';
