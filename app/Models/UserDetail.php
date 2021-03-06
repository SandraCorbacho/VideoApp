<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends BaseController
{
    use HasFactory;
    protected $fillabe = ['user_id', 'description', 'image'];
}
