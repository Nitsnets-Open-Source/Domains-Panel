<?php declare(strict_types=1);

namespace App\Domains\User\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthRedirect
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (empty($user)) {
            return $next($request);
        }

        if (empty($user->enabled)) {
            return redirect()->route('user.disabled');
        }

        return redirect()->route('dashboard.index');
    }
}
