<?php declare(strict_types=1);

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as KernelVendor;
use App\Domains\User\Middleware\Auth as UserAuth;
use App\Domains\User\Middleware\AuthRedirect as UserAuthRedirect;
use App\Domains\User\Middleware\Enabled as UserEnabled;

class Kernel extends KernelVendor
{
    /**
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        Middleware\RequestLogger::class,
        Middleware\Reset::class,
        Middleware\MessagesShareFromSession::class,
    ];

    /**
     * @var array
     */
    protected $routeMiddleware = [
        'user.auth' => UserAuth::class,
        'user.auth.redirect' => UserAuthRedirect::class,
        'user.enabled' => UserEnabled::class,
    ];
}
