<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeeVideoController extends Controller
{
    public function index(Request $request)
    {
    
        $request->user()->authorizeRoles(['user','loader', 'admin']);
        return view('home');
    }
}
