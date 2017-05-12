<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\User;
use App\Question;
use App\Category;
use App\Achievement;
use App\UserAchievement;
use Illuminate\Http\Request;
use App\Service\QuestionService;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\DeleteQuestionRequest;
use App\Http\Controllers\Traits\RewardsAchievements;
use App\BusinessLogic\Interfaces\QuestionInterface;
use App\BusinessLogic\Interfaces\CategoryInterface;


class QuestionController extends Controller
{

    use RewardsAchievements;

    private $questionService;

    public function __construct(QuestionService $questionService){
        $this->middleware('auth', ['except' => ['index', 'show', 'filter']]);
        $this->questionService = $questionService;
    }

    public function index()
    {
        $questions = $this->questionService->questionInterface->orderBy('id', 'DESC')->paginate(5);
        $topquestions = $this->questionService->topQuestion();
        return view('questions.index', compact('questions', 'topquestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->questionService->categoryInterface->all();
        return view('questions.create', compact('categories'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $this->questionService->questionInterface->create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'votes' => 0,
            'user_id' => Auth::id()
        ]);
        $this->checkForQuestionAchievements(Auth::user());
        session::flash('success', $this->flashMessage);
        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=$this->questionService->questionInterface->find($id);
        $topquestions = $this->questionService->topQuestion(); 
        return view ('questions.show',compact('question', 'topquestions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function filter($orderBy){
        $questions = $this->questionService->filter($orderBy);
        $topquestions = $this->questionService->topQuestion();
        return view ('questions.index',compact('questions','topquestions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->questionService->update($id, $request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteQuestionRequest $request)
    {
        $this->questionService->delete($request->id);
        return redirect()->route('questions.index');
    }
    
}