<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Channel;

class VideoController extends Controller
{
  
    public function index(Request $request, $id){

      if(\Auth::User()){
        $autorized = $request->user()->authorizeRoles(['user','loaders', 'admin']);
            if($autorized){
                $video = Video::where('id','=',$id)->first();
                $channel = Channel::where('id','=',$video->channel_id)->first();
                $otherVideos = Video::get();;
                
                return view('front.video.details')
                ->with('video', $video)
                ->with('channel', $channel)
                ->with('otherVideos', $otherVideos);
            }
   
            if(RoleUp::where('user_id','=',\Auth::User())->where('atendida', 0)->first()!= null){
                return back()->withErrors(['No estás autorizado']); 
            }
        
            return back()->withErrors(['Esperando respuesta del administrador']); 
        }
        return back()->withErrors(['No estás autorizado']); 
    }
}
