<?php

namespace Modules\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Modules\User\Constants\RolesEnum;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->hasRole(RolesEnum::ADMIN->value)) {
            throw new UnauthorizedException("Allowed only Admins");
        }
        return $next($request);
    }
}
