<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends BaseController
{
    use HasFactory;
    protected $fillable = ['user_id', 'channel_id'];
    private function subscription()
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'id')->get();
    }
    private function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->get();
    }
}
