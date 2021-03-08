<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\RoleUp;

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
        
        $peticion = RoleUp::where('user_id','=',\Auth::User()->id)->first();
        if($peticion!= null){
           
            if($peticion->atendida == 0){
                return back()->withErrors(['Esperando respuesta del administrador']); 
            }
            
        }
        return back()->withErrors(['No estás autorizado']); 
    }
}