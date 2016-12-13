<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

use Session;
use Auth;

class AnswerController extends Controller
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
        if(auth::guest())
            return view('auth.login');
        //validate data
        $this -> validate($request ,array(
               
                'content'  => 'required | max:500| unique:answers'
            ));

        //save to database
        
        $answer=new Answer;

        $answer->content = $request->content;
        $answer->question_id = $request->id;
        $answer->user_id = Auth::user()->id;
        

        //Category::create([$category]);

        $answer->save();
        //redirect to another page

        Session::flash('success','Your comment was successfully posted!');

        return redirect()->route('questions.show',$answer->question->id);
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
