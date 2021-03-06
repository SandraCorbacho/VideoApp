<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends BaseController
{
    use HasFactory;
    protected $fillabe = ['video_id', 'user_id'];

    public function video(){
        return $this->belongsTo(Videos::class, 'video_id', 'id')->get();
    }
    public function detial(){
        return $this->belongsTo(CommentDetail::class, 'comment_id', 'id')->get();
    }
}
