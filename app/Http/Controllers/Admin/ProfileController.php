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
            $request->user()->authorizeRoles(['loaders', 'admin']);
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
}
