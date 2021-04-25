<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CommentsDetail;
use App\Models\User;

class Comment extends BaseController
{
    use HasFactory;
    protected $fillabe = ['video_id', 'user_id'];
    protected $appends = ['title'];

    public function video(){
        return $this->belongsTo(Videos::class, 'video_id', 'id')->get();
    }
    public function detail(){
        return $this->hasOne(CommentsDetail::class);
    }
    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }
    public function getTitleAttribute(){
    
        return CommentsDetail::where('comment_id','=', $this->id)->first();
    }
}
