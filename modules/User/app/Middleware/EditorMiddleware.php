<?php

namespace Modules\User\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Modules\Project\Constants\ProjectPermissionsEnum;
use Symfony\Component\HttpFoundation\Response;

class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->hasPermissionTo(ProjectPermissionsEnum::EDIT->value)) {
            throw new UnauthorizedException();
        }
        return $next($request);
    }
}
