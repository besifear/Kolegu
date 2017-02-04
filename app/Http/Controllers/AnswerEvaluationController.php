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

    public function upVote(Request $request){
        if(Auth::guest())
            return view('auth.login');

        $answerEv=AnswerEvaluation::where([
            ['answer_id','=',$request->id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($answerEv)==null) {
            $answerEv = new AnswerEvaluation;
            $answerEv->vote = 'Yes';
            $answerEv->answer_id = $request->id;
            $answerEv->user_id = Auth::user()->id;
            $questionAskingUser= User::find((Question::find((Answer::find($request->id))->question_id))->user_id);
            $questionAskingUser->reputation+=1;
            $questionAskingUser->save();
        }else{
            $answerEv->vote = 'Yes';
            $questionAskingUser= User::find((Question::find((Answer::find($request->id))->question_id))->user_id);
            $questionAskingUser->reputation+=1;
            $questionAskingUser->save();
        }

        //Category::create([$category]);

        $answerEv->save();
        //redirect to another page

        
         return Redirect::back();
        //return redirect('questions/2');
    }

    public function downVote(Request $request){
        if(Auth::guest())
            return view('auth.login');

        $answerEv=AnswerEvaluation::where([
            ['answer_id','=',$request->id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($answerEv)==null) {
            $answerEv = new AnswerEvaluation;
            $answerEv->vote = 'No';
            $answerEv->answer_id= $request->id;
            $answerEv->user_id = Auth::user()->id;
            $questionAskingUser= User::find((Question::find((Answer::find($request->id))->question_id))->user_id);
            $questionAskingUser->reputation-=1;
            $questionAskingUser->save();
        }else{
            $answerEv->vote = 'No';
            $questionAskingUser= User::find((Question::find((Answer::find($request->id))->question_id))->user_id);
            $questionAskingUser->reputation-=1;
            $questionAskingUser->save();
        }
        //Category::create([$category]);

        $answerEv->save();
        //redirect to another page

        return Redirect::back();
        //return redirect('questions/2');
    }
}
