<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    //
    public function create() {
        $comment =  new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }

    public function delete($id) {
        $comment = Comment::find($id);

        // if($comment->user_id == auth()->user()->id) {
        //     $comment->delete();
        //     return back();
        // } else {
        //     return back()->with('error', 'Unauthorize');
        // }

        //Use gate for authorize
        // if(Gate::allows('comment-delete', $comment)) {
        //     $comment->delete();
        //     return back();
        // } else {
        //     return back()->with('error', 'Unauthorize');
        // }

        $comment = Comment::find($id);
        if(Gate::denies('comment-delete', $comment)) {
            return back()->with('error', 'Unauthorize');
        }
        $comment->delete();
        return back();
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
