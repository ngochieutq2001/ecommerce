<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $userRole = Auth::user()->role;
        
        // hierarchical
        // Admin can access all routes
        if ($userRole === 'admin') {
            return $next($request);
        }
            
        // Seller can access routes for seller and user
        if ($userRole === 'seller' && ($role === 'seller' || $role === 'user')) {
            return $next($request);
        }
        
        // User can access routes for user
        if ($userRole === $role) {
            return $next($request);
        }
        
        abort(403, 'Unauthorized');
    }
}

