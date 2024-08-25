<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $userRole = $request->user()->role;

            if ($userRole === 'user' && $role !== 'user' ) {
              return redirect('dashboard');

            } elseif ($userRole === 'admin' && $role === 'user') {
               return redirect('/admin/dashboard');
            } elseif ($userRole === 'manager' && $role === 'user') {
               return redirect('/manager/dashboard');
            }elseif ($userRole === 'admin' && $role === 'manager') {
               return redirect('/admin/dashboard');
            }elseif ($userRole === 'manager' && $role === 'admin') {
               return redirect('/manager/dashboard');
            }
        return $next($request);
    }
}
