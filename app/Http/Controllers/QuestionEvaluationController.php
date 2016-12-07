<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QuestionEvaluation;

use App\Category;
use Session;

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
            ['QuestionID','=',$request->QuestionID],
            ['Username','=','Admini'],
        ])->first();

        if(($questionEv)==null) {
            $questionEv = new QuestionEvaluation;
            $questionEv->Vote = 'Yes';
            $questionEv->QuestionID = $request->QuestionID;
            $questionEv->Username = 'Admini';
        }else{
            $questionEv->Vote = 'Yes';
        }

        //Category::create([$category]);

        $questionEv->save();
        //redirect to another page

        

        return redirect('/');
    }

    public function downVote(Request $request){
        $questionEv=QuestionEvaluation::where([
            ['QuestionID','=',$request->QuestionID],
            ['Username','=','Admini'],
        ])->first();

        if(($questionEv)==null) {
            $questionEv = new QuestionEvaluation;
            $questionEv->Vote = 'No';
            $questionEv->QuestionID = $request->QuestionID;
            $questionEv->Username = 'Admini';
        }else{
            $questionEv->Vote = 'No';
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
