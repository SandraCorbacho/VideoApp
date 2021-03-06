<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent;
use App\Models\Channel;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class ChannelController extends CrudController
{
    public function create(Request $request){
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $channel = new Channel();
        
        $photo = $request['image'];
        $path = 'photos/channel';
        
        //dd($request->file('photo'));
        $filePath = $this->store($request, $path, 'image');
            
        $channel->user_id = \Auth::User()->id;
        $channel->description = $request['description'];
        $channel->title = $request['title'];
        $channel->image = $filePath;
        $channel->save();
        
        return redirect()->route('profile');
    }
    public function edit(Request $request){
        $channel = \Auth::User()->channel;
        $path = 'photos/channel';
        if(empty($request->all())){
            return view('admin.form.edit')
            ->with('item', 'Channel')
            ->with('channel', $channel);    
        }
        //dd(\Auth::User()->id);
        Validator::make($request->all(), [
            'title' => [
                'required',
                 Rule::unique('id')->ignore(\Auth::User()->id),
            ],
            
            'description' => ['required']
        ]);
        
        $channel = \Auth::User()->channel;
        $channel->description = $request['description'];
        $channel->title = $request['title'];
        
        if($request['image'] != null){
            $channel->image = $this->store($request, $path);
        }

        $channel->save();
        return redirect()->route('profile');
    }
}