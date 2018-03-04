<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AnswerEvaluation;

use App\Answer;
use App\User;
use App\Question;

use Auth;


use Redirect;
class AnswerEvaluationController extends Controller
{

    function __construct()
    {
        $this->middleware( ['auth']); 
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
        //
    }

    /**
     * Stores the upvote or the downvote of a user for a Answer and gives or removes 
     * reputation to the User who supplied the answer
     *  
     * @param  \Illuminate\Http\Request $request | Holds the Request data of the client that made the upvote or downvote
     */
    public function vote(Request $request)
    {
        $questionAskingUser= User::find( $request->question_author_id );
        $answer = Answer::find($request->answer_id);
        $answerEv = $answer->getMyVote;
         
        if ( $answerEv == null ){
            AnswerEvaluation::create([
                'vote'      => $request->vote == 1 ? 'Yes' : 'No',
                'answer_id' => $answer->id,
                'user_id'   => Auth::id()
            ]);
            
            $answer->totalVotes += 1;
            $answer->save();
            
            $questionAskingUser->reputation+=1;
            $questionAskingUser->save();
        }else if($answerEv->vote == 'No' && $request->vote == 1){
            $answerEv->vote = 'Yes';
            $answerEv->save();

            $questionAskingUser->reputation+=2;
            $questionAskingUser->save();
        }else if($answerEv->vote == 'Yes' && $request->vote == 0){
            $answerEv->vote = 'No';
            $answerEv->save();

            $questionAskingUser->reputation-=2;
            $questionAskingUser->save();
        }else{
            $answerEv->delete();
            if ( $answerEv->vote == 'Yes'){
                $questionAskingUser->reputation-=1;
            }else{
                $questionAskingUser->reputation+=1;
            }
            $questionAskingUser->save();
        }
    }

}
