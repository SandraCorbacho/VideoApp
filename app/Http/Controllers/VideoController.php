<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Channel;
use App\Models\RoleUp;
use App\Models\Comment;

class VideoController extends Controller
{
  
    public function index(Request $request, $id){

        if(\Auth::User()){
            $autorized = $request->user()->authorizeRoles(['user','loaders', 'admin']);
                if($autorized){
                    $video = Video::where('id','=',$id)->first();
                    $channel = Channel::where('id','=',$video->channel_id)->first();
                    $otherVideos = Video::get();;
                    $comments = Comment::where('video_id',$video->id)->get();
                    return view('front.video.details')
                    ->with('video', $video)
                    ->with('channel', $channel)
                    ->with('otherVideos', $otherVideos)
                    ->with('comments', $comments);
                }
            $peticion = RoleUp::where('user_id','=',\Auth::User()->id)->first();
            if($peticion!= null){
                if($peticion->atendida == 0){
                    return back()->withErrors(['Esperando respuesta del administrador']); 
                }
              
            }
        }
        return back()->withErrors(['No estás autorizado']); 
    }
    public function vote($id){
        
        $video = Video::where('id','=',$id)->first();
       
        $video->votes = $video->votes +1;
        $video->update();
        return  $video->votes;
       
    }
}

