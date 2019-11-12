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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->category->all();
        $inputs = $request->all();
        // dd($inputs);
        if(!empty($inputs['search-word'])) {
            $questions = $this->question->getSearchRecode($inputs);
        }elseif(!empty($inputs['tag_category_id'])) {

        }else{
            $questions = $this->question->all();
        }
        // if(!empty($inputs)) {
        //     $questions = $this->question->getSearchCategory($inputs);
        return view('user.question.index', compact('questions', 'inputs', 'categories'));
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
        $input = $this->question->find($id);
        return view('user.question.edit', compact('input', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionsRequest  $request
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $this->question->find($id)->fill($inputs)->save();
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
    * 
    */
    public function mypage()
    {
        $myQuestions = $this->question->where('user_id', Auth::id())->get();
        return view('user.question.mypage', compact('myQuestions'));
    }

    public function confirm(QuestionsRequest $request)
    {
        $inputs = $request->all();
        $category = $this->category->find($inputs['tag_category_id'])->name;
        return view('user.question.confirm', compact('inputs', 'category'));
    }

    public function storeComment(CommentRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $this->comment->create($input);
        return redirect()->route('question.index');
    }
}
