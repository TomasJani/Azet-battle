<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employee');
    }

    public function storeQuestion(Request $request, $company)
    {
        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->commentable_id = request('question_id');
        $comment->commentable_type = 'App\Question';
        $comment->body = request('body');

        $comment->save();

        return redirect()->back();
    }

    public function storeAnswer(Request $request, $company)
    {
        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->commentable_id = request('answer_id');
        $comment->commentable_type = 'App\Answer';
        $comment->body = request('body');

        $comment->save();

        return redirect()->back();
    }

        public function update(Request $request, $company, Comment $comment)
    {
        $comment->body = request('body');

        $comment->save();

        return redirect()->back();
    }

    public function destroy($company, Comment $comment)
    {
        if (auth()->user()->id() === $comment->user_id){
            Comment::destroy($id);
        }
    }
}
