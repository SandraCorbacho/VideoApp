<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Channel;

class VideoController extends Controller
{
  
    public function index(Request $request, $id){

      //dd($request->user()->authorizeRoles(['user','loaders', 'admin']));
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
        dd(RoleUp::where('user_id','=',\Auth::User())->first());
        if(empty(RoleUp::where('user_id','=',\Auth::User())->first())){
            return back()->withErrors(['No estás autorizado']); 
        }
        return back()->withErrors(['Esperando respuesta del administrador']); 
    }
}
