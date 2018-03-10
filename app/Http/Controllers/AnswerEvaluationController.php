<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\User;
use App\Answer;
use App\Question;
use App\AnswerEvaluation;
use Illuminate\Http\Request;
use App\Http\Requests\VoteAnswerRequest;

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
    public function vote( VoteAnswerRequest $request)
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
            //TODO: refractor $request->vote so that it returns -1 for downvote in ( AnswerItem.vue && AnswerList.vue ) 
            //so that it doesn't have to be refractored in the line below.
            $requestVote = $request->vote == 1 ? 1 : -1;
            $answer->modifyVoteCount( $requestVote ); 

            $questionAskingUser->reputation+=1;
            $questionAskingUser->save();
        }else if($answerEv->vote == 'No' && $request->vote == 1){
            $answer->modifyVoteCount(2);
            $answerEv->vote = 'Yes';
            $answerEv->save();

            $questionAskingUser->reputation+=2;
            $questionAskingUser->save();
        }else if($answerEv->vote == 'Yes' && $request->vote == 0){
            $answer->modifyVoteCount(-2);
            $answerEv->vote = 'No';
            $answerEv->save();

            $questionAskingUser->reputation-=2;
            $questionAskingUser->save();
        }else{
            $answerEv->delete();
            if ( $answerEv->vote == 'Yes'){
                $answer->modifyVoteCount(-1);
                $questionAskingUser->reputation-=1;
            }else{
                $answer->modifyVoteCount(1);
                $questionAskingUser->reputation+=1;
            }
            $questionAskingUser->save();
        }
        $answer->save();
    }

}
