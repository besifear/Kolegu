<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Redirect;
use App\User;
use App\Category;
use App\Question;
use App\QuestionEvaluation;
use Illuminate\Http\Request;
use App\Services\QuestionService;

class QuestionEvaluationController extends Controller
{
    private $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->middleware('auth', [ 'except' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'] ] );
        $this->questionService = $questionService;
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
        
        
    
    }

    public function upVote(Request $request){
        if(Auth::guest())
            return view('auth.login');
        if (Auth::user()->reputation==null){
            $useri = User::find(Auth::user()->id);
            $useri->reputation=0;
            $useri->save();
        }

        $questionEv=QuestionEvaluation::where([
            ['question_id','=',$request->question_id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        $question = Question::find($request->question_id);
        $questionAskingUser = $this->questionService->find($request->question_id)->user;

        if(($questionEv)==null) {
            $questionEv = new QuestionEvaluation;
            $questionEv->vote = 'Yes';
            $questionEv->question_id= $request->question_id;
            $questionEv->user_id = Auth::user()->id;
            $questionEv->save();
            $question->votes += 1;
            $question->save();
            $questionAskingUser->reputation+=1;
            $questionAskingUser->save();

        }else {
            if ($questionEv->vote != 'Yes') {
                $questionEv->vote = 'Yes';
                $questionEv->save();
                $questionAskingUser->reputation+=2;
                $question->votes += 2;
                $question->save();
                $questionAskingUser->save();

            } else{
                $questionEv->delete();
                $question->votes -= 1;
                $question->save();
                $questionAskingUser->reputation-=1;
                $questionAskingUser->save();
            }

        }
        

        return Redirect::back();
    }

        public function downVote(Request $request){
        if(Auth::guest())
            return view('auth.login');
        if (Auth::user()->reputation==null){
            $useri = User::find(Auth::user()->id);
            $useri->reputation=0;
            $useri->save();
        }

        $questionEv=QuestionEvaluation::where([
            ['question_id','=',$request->question_id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        $question = Question::find($request->question_id);
        $questionAskingUser = $this->questionService->find($request->question_id)->user;

        if(($questionEv)==null) {
            $questionEv = new QuestionEvaluation;
            $questionEv->vote = 'No';
            $questionEv->question_id= $request->question_id;
            $questionEv->user_id = Auth::user()->id;
            $questionEv->save();
            $question->votes -= 1;
            $question->save();
            $questionAskingUser->reputation-=1;
            $questionAskingUser->save();
        }else {
            if ($questionEv->vote != 'No') {
                $questionEv->vote = 'No';
                $questionEv->save();
                $question->votes -= 2;
                $question->save();
                $questionAskingUser->reputation-=2;
                $questionAskingUser->save();
            }else{
                $questionEv->delete();
                $question->votes += 1;
                $question->save();
                $questionAskingUser->reputation+=1;
                $questionAskingUser->save();
            }
        }
        

        return Redirect::back();
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
}
