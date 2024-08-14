<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');
    Volt::route('teacher_register', 'pages.auth.teacher_register')
        ->name('teacher_register');
    Volt::route('/', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
    Volt::route('/learn-html-topic', 'courses.learn-html-topic')->name('learnHtmlTopic');
    Volt::route('/learn-css-topic', 'courses.learn-css-topic')->name('learnCssTopic');
    Volt::route('/enrollment', 'enrollment.enroll')->name('enrollment');
    Volt::route('/grades-insert', 'grades.grades_create')->name('gradesInsert');
});
