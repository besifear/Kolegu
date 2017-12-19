<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

use Auth;
use Session;
use Redirect;
use App\Achievement;
use App\UserAchievement;
use App\Services\AnswerService;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Controllers\Traits\RewardsAchievements;

class AnswerController extends Controller
{
    use RewardsAchievements;

    private $answerService;

    /**
     *  AnswerController manages are requests that are made to manipulate with the Answer model. 
     * 
     * @param AnswerService | AnswerService holds all the BusinessLogic for the Answer model.
     */
    public function __construct( AnswerService $answerService ){
        $this->answerService = $answerService; 
        $this->middleware( 'auth' ); 
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request)
    {

        $answer = $this->answerService->storeAnswer([
            'content'       => $request->content,
            'question_id'   => $request->id,
            'user_id'       => Auth::id()
        ]);
        
        $this->checkForAchievements( "Answer", Auth::user() );
        Session::flash('success', $this->flashMessage );
        return redirect()->route('questions.show', $answer->question->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $answer=Answer::find($id);

        $evaluations=$answer->allEvaluations;

        

        foreach($evaluations as $eval){
            $eval->delete();
        }

        
        $answer->delete();

        return Redirect::back();
    }
}
