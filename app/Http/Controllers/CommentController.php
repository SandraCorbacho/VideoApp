<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\CommentsDetail;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function add($id){
        $comment = new comment;
        $comment->video_id = $id;
        $comment->user_id = \Auth::User()->id;
        $comment->save();
        $request = \Request::all();
        $commentDetail = new CommentsDetail;
        $commentDetail->comment_id = $comment->id;
        $commentDetail->title = $request['comment'];
        $commentDetail->description = "Prueba";
        $commentDetail->save();
        return redirect()->route('videoDetail',['id' => $id]);
    }
}
