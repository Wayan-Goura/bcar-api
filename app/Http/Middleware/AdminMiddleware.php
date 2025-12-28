<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/admin/login');
        }

        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}