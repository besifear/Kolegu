<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QuestionEvaluation;
use App\Category;

use Session;
use Auth;

class QuestionEvaluationController extends Controller
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
        
        
    
    }

    public function upVote(Request $request){
        $questionEv=QuestionEvaluation::where([
            ['question_id','=',$request->id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($questionEv)==null) {
            $questionEv = new QuestionEvaluation;
            $questionEv->vote = 'Yes';
            $questionEv->question_id = $request->id;
            $questionEv->user_id = Auth::user()->id;
        }else{
            $questionEv->vote = 'Yes';
        }

        //Category::create([$category]);

        $questionEv->save();
        //redirect to another page

        

        return redirect('/');
    }

    public function downVote(Request $request){
        $questionEv=QuestionEvaluation::where([
            ['question_id','=',$request->id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($questionEv)==null) {
            $questionEv = new QuestionEvaluation;
            $questionEv->vote = 'No';
            $questionEv->question_id= $request->id;
            $questionEv->user_id = Auth::user()->id;
        }else{
            $questionEv->vote = 'No';
        }
        //Category::create([$category]);

        $questionEv->save();
        //redirect to another page


        return redirect('/');
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
