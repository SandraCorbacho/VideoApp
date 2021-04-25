<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class CommentsDetail extends BaseController
{
    use HasFactory;
    protected $fillabe = ['comment_id',  'title', 'description'];

    public function comment(){
        return $this->HasOne(Comment::class)->get();
    }
}
