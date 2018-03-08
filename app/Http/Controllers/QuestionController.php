<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\User;
use App\Question;
use App\Category;
use App\Achievement;
use App\UserAchievement;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use App\Services\QuestionService;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\DeleteQuestionRequest;
use App\Http\Controllers\Traits\RewardsAchievements;
use App\BusinessLogic\Interfaces\QuestionInterface;
use App\BusinessLogic\Interfaces\CategoryInterface;
use App\Services\QuestionCategoriesService;
use JavaScript;

class QuestionController extends Controller
{

    use RewardsAchievements;

    private $questionService, $questionCategoriesService;

    public function __construct(QuestionService $questionService, QuestionCategoriesService $questionCategoriesService){
        $this->middleware('auth', ['except' => ['index', 'show', 'filter']]);
        $this->questionService = $questionService;
        $this->questionCategoriesService = $questionCategoriesService; 
    }

    public function index()
    {
        $questions = $this->questionService->questionInterface->orderBy('id', 'DESC')->paginate(5);
        $topquestions = $this->questionService->topQuestion();

        $reactVariablesArray = [
            'questions' => $questions,
            'currentUser' => Auth::user(),
            'token' => Session::token()
        ];

        if( !Auth::guest() ){
            $reactVariablesArray['currentUserId'] = Auth::id();
        }

        JavaScript::put( $reactVariablesArray );

        if(!Auth::guest()&&Auth::user()->selectedCategories->isEmpty()){
            return redirect()->route('Kategorite');
        }else{
            return view('questions.index', compact('questions', 'topquestions'));
        }
    }

    public function test(){
        return Question::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( isset( $_GET['t'] ) ){
            $title = $_GET['t'];
        }else{
            $title = "";
        }

        $categories = $this->questionService->categoryInterface->all();
        return view('questions.create', compact('categories', 'title'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = $this->questionService->questionInterface->create([
            'title' => $request->title,
            'content' => $request->content,
            'votes' => 0,
            'user_id' => Auth::id()
        ]);

        $this->questionCategoriesService->create( $question->id, $request->categories_list );
        
        $this->checkForAchievements( "Question", Auth::user() );
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
     * @param  \Illuminate\Http\Request  $request | Holds The data of the Request that was made to update this question
     * @param  int  $id | Holds the id of the question that will be updated
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request, $id)
    {
        $allowedModifications = ['answer_id' => null ];
        $requestedModifications = array_intersect_key( $request->all(), $allowedModifications );
        if ( $requestedModifications['answer_id'] == 'remove-best-answer' ){
            $requestedModifications['answer_id'] = null; 
        }
        $this->questionService->update( $id, $requestedModifications );
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