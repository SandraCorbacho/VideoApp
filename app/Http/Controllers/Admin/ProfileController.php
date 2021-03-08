<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\User;
use App\Models\Video;

class ProfileController
{
    public function index(Request $request)
    { 
      
            $autorized = $request->user()->authorizeRoles(['loaders', 'admin']);
            if($autorized){
                $user = \Auth::User();         
                $channel = $user->channel;
                //ToDo -- Cambiar por la relacion
                $videos=[];
                if(($channel)!=null){
                    $videos = Video::where('channel_id','=',$channel->id)->get();
                }
                
                return view('admin.profile',[
                    'channel' => $user->channel,
                    'videos' => $videos
                ]);
            }
            $peticion = RoleUp::where('user_id','=',\Auth::User()->id)->first();
            //dd($peticion);
            if($peticion!= null){
                if($peticion->atendida == 0){
                return back()->withErrors(['Esperando respuesta del administrador']); 
                    
                }
            }
            return back()->withErrors(['No estás autorizado']); 
    }
}
