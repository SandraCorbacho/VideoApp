<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Channel;

class VideoController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth','role:loader']);
    }
    public function index(Request $request, $id){

      //dd($request->user()->authorizeRoles(['user','loaders', 'admin']));
        $request->user()->authorizeRoles(['user','loaders', 'admin']);
        if($request){
            $video = Video::where('id','=',$id)->first();
            $channel = Channel::where('id','=',$video->channel_id)->first();
            
            return view('front.video.details')
            ->with('video', $video)
            ->with('channel', $channel);
        }
        return back();
    }
   
}
