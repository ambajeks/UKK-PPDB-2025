<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Gate::allows('admin')) {
            abort(403, 'Access denied. You are not authorized to access this page.');
        }

        return $next($request);
    }
}
