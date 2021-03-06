<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class WellcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function index(Request $request)
    {
       // $request->user()->authorizeRoles(['user', 'admin']);
       $videos = Video::orderby('updated_at','DESC')->get();
      
        return view('welcome')
        ->with('videos', $videos);
    }
}
