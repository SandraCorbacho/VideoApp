<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoleUser;

class RoleUser extends Model
{
    use HasFactory;
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
    public function roles()
    {
        //dd($this->belongsTo(Role::class, 'id', 'user_id'));
        return $this->belongsTo(RoleUser::class, 'id', 'user_id');
       
    }
}
