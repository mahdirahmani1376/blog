<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->user()?->is_admin){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
