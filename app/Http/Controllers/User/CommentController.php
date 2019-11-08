<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    protected $comments;

    public function __construct(Comment $comment)
    {
        $this->middleware('auth');
        $this->comments = $comment;
    }

    public function index()
    {
        $comments = $this->comments->all();
        dd($comments);
        return view('user.question.show', compact('comments'));
    }

    public function create(Request $request)
    {
        return redirect()->route('comment.index');
    }
    
}
