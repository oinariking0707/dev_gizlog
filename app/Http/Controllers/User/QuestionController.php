<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Requests\User\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use App\Models\Comment;
use App\Models\TagCategory;

class QuestionController extends Controller
{
    protected $question;
    protected $comment;
    protected $category;

    public function __construct(Question $question, TagCategory $tagcategory, Comment $comment)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->comment = $comment;
        $this->category = $tagcategory;
    }
    /**
     * Display a listing of the resource.
     *
     * \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $categories = $this->category->all();
        $questions = $this->question->getRecode($input);
        $request->flash();
        return view('user.question.index', compact('questions', 'categories', 'input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        return view('user.question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();
        $inputs = $request->all();
        $this->question->create($inputs);
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avatar = $this->question->all();
        $input = $this->question->find($id);
        return view('user.question.show', compact('input', 'avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->category->all();
        $questionInput = $this->question->find($id);
        return view('user.question.edit', compact('questionInput', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  int  $Id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_id'] = Auth::id();
        $input = $request->all();
        $this->question->find($id)->fill($input)->save();
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->find($id)->delete();
        return redirect()->route('question.index');
    }

    /**
     * マイページ表示
     * @return \Illuminate\Http\Response
     */
    public function mypage()
    {
        $myQuestions = $this->question->authUserQuestions();
        return view('user.question.mypage', compact('myQuestions'));
    }

    /**
     * 確認画面表示
     * @param  QuestionsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(QuestionsRequest $request)
    {
        $input = $request->all();
        $category = $this->category->find($input['tag_category_id'])->name;
        return view('user.question.confirm', compact('input', 'category'));
    }

    /**
     *
     * コメント登録
     * @param  CommentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(CommentRequest $request)
    {
        $request['user_id'] = Auth::id();
        $input = $request->all();
        $this->comment->create($input);
        return redirect()->route('question.index');
    }
}

