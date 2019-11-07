<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\QuestionsRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use App\Models\TagCategory;

class QuestionController extends Controller
{
    protected $question;

    public function __construct(Question $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        // $questions = $this->question->all();

        if(!empty($input)) {
            $questions = $this->question->getSearchRecode($input);
        }else{
            $questions = $this->question->all();
            // dd($questions);
        }
        // $tagcategory = $request->all();
        // dd($questions);
        return view('user.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = $request->all();
        $question['user_id'] = Auth::id();
        // dd($question);
        $this->question->fill($question)->save();
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
       $input = $this->question->find($id);
       return view('user.question.edit', compact('input'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = $this->question->where('user_id',$id)->get();
        //  dd($questions);
        return view('user.question.mypage', compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionsRequest  $request
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, $questionId)
    {
        $input = $request->all();
        // dd($input);
        $this->question->find($questionId)->fill($input)->save();
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
    * @param QuestionsRequest  $request
    */
    public function confirm(QuestionsRequest $request){
        $inputs = $request->all();
       $inputs['user_id'] = Auth::id();
        return view('user.question.confirm', compact('inputs'));
    }
}
