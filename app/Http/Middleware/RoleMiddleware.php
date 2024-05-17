<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{   
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (empty($roles))
            $roles = [];

        if (Auth::check()) {
            foreach ($roles as $role) {
                if (Auth::user()->type == $role) 
                    return $next($request);
            }
        } 

        return response()->json([
            "error" => 'Unauthorized'
        ], 401);
    }
}
