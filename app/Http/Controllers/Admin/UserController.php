<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\EmailServices;


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
    public function resetPassword(Request $request){
        
        $request = $request->all();
        if(isset($request['email']) && !empty($request['email'])){
            $user = User::where('email','=', $request['email'])->first();
            if($user){
                $allcorrect = 1;
                $password = substr(md5(microtime()),1,5);
                $user->password = bcrypt($password);
                $emailServices = new EmailServices;
                $emailServices->recoverPWD($user, $request['email'], $password);
                return View('front.user.resetPasword')->with([
                    'allcorrect' => $allcorrect
                ]);
                
            }else{
                return back()->withErrors([
                    'errors'=> 'No se ha enocontrado al ususrio',
                ]);
            }
        }
        return back()->withErrors([
            'errors'=> 'completa los campos requeridos',
        ]); 
    }
}
