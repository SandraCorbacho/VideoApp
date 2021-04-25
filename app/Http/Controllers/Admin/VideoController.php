<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Controllers\Admin\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent;
use App\Models\Channel;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VideoController extends CrudController
{
    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'active' => 'required',
            'video' => 'required'
        ]);
        if(!empty($request['video'])){
            $video = new Video();
                
            $video->channel_id = \Auth::User()->channel->id;
            $video->title = $request['title'];
            $video->description = $request['description'];
            $video->active = $request['active'];

            if($request['video'] != null){
               
                $path = 'video';
                $videoPath = $this->store($request, $path, 'video');

                $video->path = $videoPath;
            }else{
                return back()->withErrors();
            }

            if($request['image'] != null){

                $path = 'photo/video';
                $imagePath = $this->store($request, $path,'image');

                $video->image = $imagePath;
            }
           
            $video->save();
           
        }
       return redirect()->route('profile');
    }
    public function edit(Request $request, $id){
        $video = Video::where('id','=',$id)->first();
        
        if(empty($request->all())){
            return view('admin.form.edit')
            ->with('item', 'Video')
            ->with('video', $video);    
        }
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'active' => 'required',
        ]);

        $video = Video::where('id','=', $request->id)->first();
      
        $video->title = $request['title'];
        $video->description = $request['description'];
        $video->active = $request['active'];

        if($request['video'] != null){
            $path = 'video';
            $videoPath = $this->store($request, $path, 'video');
            $video->path = $videoPath;
        }

        if($request['image'] != null){

            $path = 'photo/video';
            $imagePath = $this->store($request, $path,'image');
            $video->image = $imagePath;
        }
      
        $video->save();
           
        
       return redirect()->route('profile');
    }
    public function delete(Request $request){
        $id = ($request->all());
        Video::where('id', $id)->delete();
        return 'ok';
    }
  
   
}