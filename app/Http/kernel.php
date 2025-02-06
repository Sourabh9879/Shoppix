<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // other middleware
        'user.auth' => \App\Http\Middleware\UserAuthMiddleware::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}