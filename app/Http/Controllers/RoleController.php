<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUp;

class RoleController extends Controller
{
    public function roleUp(){
        $user =  \Auth::User();
       
        RoleUp::create([
            'user_id'=> $user->id
        ]);
        return back()->with('status', 'Petición enviada correctamente');
    }
}