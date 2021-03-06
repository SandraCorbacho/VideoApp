<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function create($item){
       
        return view('admin.form.create')->with('item', $item);    
    }
    
    public function detail($item){
        return view('admin.detail')
        ->with('item', $item)
        ->with('channel',\Auth::User()->channel);    
    }
  
}