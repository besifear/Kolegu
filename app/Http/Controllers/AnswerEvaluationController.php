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

    public function vote(Request $request)
    {
        $questionAskingUser= User::find( $request->question_author_id );
        $answer = Answer::find($request->answer_id);
        $answerEv = $answer->getMyVote;
         
        if ( $answerEv == null ){
        var_dump( 'here 1' ); 
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
        var_dump( 'here 2' ); 
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
        var_dump( 'here3' );
            $answerEv->delete();
            if ( $answerEv->vote == 'Yes'){
                $questionAskingUser->reputation-=1;
            }else{
                $questionAskingUser->reputation+=1;
            }
            $questionAskingUser->save();
        }
    }

    public function upVote(Request $request){
        if(Auth::guest())
            return view('auth.login');

        $answer = Answer::find($request->id);
        // qetu me e ndru qeta
        dd( $request->input() );
        $questionAskingUser= Answer::find( $request->id )->question->user; 
        //User::find((Question::find((Answer::find($request->id))->question_id))->user_id);

        $answerEv=AnswerEvaluation::where([
            ['answer_id','=',$answer->id],
            ['user_id','=',Auth::user()->id],
        ])->first();




        // Nqs nuk ka pasur vlersim paraprak
        if(($answerEv)==null) {
            $answerEv = new AnswerEvaluation;
            $answerEv->vote = 'Yes';
            $answerEv->answer_id = $request->id;
            $answerEv->user_id = Auth::user()->id;
            $questionAskingUser->reputation+=1;
            $answer->totalVotes+= 1;
            $questionAskingUser->save();
        }else{
        // Nqs ka pas vlersim negative paraprak
            if($answerEv->vote == 'No'){

                $answerEv->vote = 'Yes';
                $questionAskingUser->reputation+=2;
                $questionAskingUser->save();
            }else{

        // nqs e ka upvote e ka kliku edhe niher e ka hek upvote in
                $answerEv->delete();
                $questionAskingUser->reputation-=1;
                $questionAskingUser->save();
            }

        }

        //Category::create([$category]);

        $answerEv->save();
        //redirect to another page

        
         return Redirect::back();
        //return redirect('questions/2');
    }

    public function downVote(Request $request){

        $answer = Answer::find($request->id);
        
        $questionAskingUser= Answer::find( $request->id )->question->user; 

        $answerEv=AnswerEvaluation::where([
            ['answer_id','=',$request->id],
            ['user_id','=',Auth::user()->id],
        ])->first();



        // Nqs nuk ka pasur vlersim paraprak
        if(($answerEv)==null) {
            $answerEv = new AnswerEvaluation;
            $answerEv->vote = 'No';
            $answerEv->answer_id = $request->id;
            $answerEv->user_id = Auth::user()->id;
            $questionAskingUser->reputation+=1;
            $answer->totalVotes-= 1;
            $questionAskingUser->save();
        }else{
            // Nqs ka pas vlersim pozitiv paraprak
            if($answerEv->vote == 'Yes'){
                $answerEv->vote = 'No';
                $questionAskingUser->reputation-=2;
                $questionAskingUser->save();
            }else{
                // nqs e ka downvote e ka kliku edhe niher e ka hek downvote in
                $answerEv->delete();
                $questionAskingUser->reputation+=1;
                $questionAskingUser->save();
            }

        }
        //Category::create([$category]);

        $answerEv->save();
        //redirect to another page

        return Redirect::back();
        //return redirect('questions/2');
    }
}
