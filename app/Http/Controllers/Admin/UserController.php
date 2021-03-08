<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;


class UserController
{
    public function show(Request $request)
    { 
      
            $autorized = $request->user()->authorizeRoles(['admin']);

            if($autorized){
                $user = User::get(); 
               
                return view('admin.users',[
                    'users' => $user,
                    
                ]);
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
