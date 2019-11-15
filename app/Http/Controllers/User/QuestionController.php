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
        $input = $request->all();
        // dd($input);
        $categories = $this->category->all();
    // dd($categories);
        $words = $request->search_word;
        // dd($word);
        $category = $request->tag_category_id;
        // dd($inputs);


        if(!empty($input['search_word'])) {
            $questions = $this->question->getSearchRecode($input);
        }elseif(!empty($input['tag_category_id'])) {
            $questions = $this->question->getSearchCategory($input);
        }else{
            $questions = $this->question->paginate(10);
        }
        // $questions = Question::paginate(5);
        return view('user.question.index', compact('questions', 'categories','input'));
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
        $myQuestions = Question::paginate(10);
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
