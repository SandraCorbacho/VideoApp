<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUp;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    public function create(){
        $user =  \Auth::User();
       
        RoleUp::create([
            'user_id'=> $user->id
        ]);
        return back()->with('status', 'Petición enviada correctamente');
    }
    public function roleUp(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $roleUp = RoleUp::where('user_id','=', $id)->where('atendida', '=', 0)->first();
        $roleUp->atendida = 1;
        $roleUp->aceptada = 1;
        $roleUp->save();
        $user = User::where('id','=',$id)->first();
        //$idRol=$user->roles['id'];
        $rol = $user->roles;
        $idRol = $rol[0]->id;
        $idNewRol = $idRol-1;
        $Newrole = Role::where('id',$idNewRol)->first();
        $user->roles()->attach($Newrole);
        return true;
    }
}