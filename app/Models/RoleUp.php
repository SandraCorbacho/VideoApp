<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUp extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id'
    ];
    public function index(){
        dd($this);
    }
    
}
