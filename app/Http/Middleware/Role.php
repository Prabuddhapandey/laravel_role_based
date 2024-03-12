<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if($request->user()->role == $role || User::getRolesList()[auth()->user()->role] < User::getRolesList()[$role]  )
        {
            return $next($request);
        } 
        return redirect('dashboard');
    }
}
