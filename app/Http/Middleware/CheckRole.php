<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if (!empty($request->user()) && ($request->user()->hasRole('admin') || $request->user()->hasRole('loaders') ) ) {
            return $next($request);
        }
        return redirect('login')
        ->with('not_admin', 'El usuario no tiene permisos');
        //return redirect('login')->with('errors', 'ususario no tiene permisos');
    }
}