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
            //dd(RoleUp::where('user_id','=',\Auth::User())->where('atendida', 0)->first());
            if(RoleUp::where('user_id','=',\Auth::User())->where('atendida', 0)->first()!= null){
                return back()->withErrors(['No estás autorizado']); 
            }
                return back()->withErrors(['Esperando respuesta del administrador']);  
           
       
    }
}
