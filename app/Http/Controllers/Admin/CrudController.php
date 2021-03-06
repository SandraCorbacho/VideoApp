<?php

namespace App\Http\Controllers\Admin;

use App\Models\Channel;
use Illuminate\Http\Request;

class CrudController
{
    public function save(Request $request, $repo){
        $data = $request->all();
        //dd($data['type']);
        $table = $data['type'];
        
        $this->storage($data['image']);
        
        $repo->save();
       
    }
    public function store(Request $request, $path, $type)
    {
       
        $path=$request->file($type)->store($path,'public');
       
        return $path;
               
    }
}