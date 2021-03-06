<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsDetail extends BaseController
{
    use HasFactory;
    protected $fillabe = ['comment_id',  'title', 'description'];

    public function comment(){
        return $this->belongsTo(CommentDetail::class, 'comment_id', 'id')->get();
    }
}
