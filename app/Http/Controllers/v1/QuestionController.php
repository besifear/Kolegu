<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
        $this->questionService = $questionService;
    }

    public function index()
    {
        $withKeys = ['upVotes',
            'downVotes',
            'allAnswers',
            'user',
            'category'
        ];
        $questions = $this->questionService->questionInterface->orderBy('id', 'DESC')->with($withKeys)->paginate(10);

        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Shouldn't be implemented in the mobile api
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $withKeys = ['upVotes',
            'downVotes',
            'allAnswersWithUser',
            'user',
            'category'
        ];
        $question=$this->questionService->questionInterface->where('id',$id)->with($withKeys)->get();

        return response()->json($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // shouldn't be implemented in the mobile api
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}