<?php

use App\Http\Middleware\EnsureRole;
use App\Http\Middleware\EnsureStudent;
use App\Http\Middleware\SeverTimingMiddleware;
use App\Http\Middleware\Student;
use App\Http\Middleware\Teacher;
use App\Http\Middleware\UserType;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => EnsureRole::class,

            'usertype' => UserType::class,
            'teacher' => Teacher::class,
            'student' => Student::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
