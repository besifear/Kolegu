<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;

use App\Category;

use Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::orderBy('QuestionID', 'DESC')->get();

        return view('questions.index')->with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        return view('questions.create2')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate data
        $this -> validate($request ,array(
                'title' => 'required | max:50',
                'content'  => 'required | max:500'
            ));

        //save to database
        
        $question=new Question;

        

        $question->title = $request->title;
        $question->content = $request->content;
        $question->categoryname = $request->categoryname;
        $question->username = "Admini";

        

        //Category::create([$category]);

        $question->save();
        //redirect to another page

        Session::flash('success','Your question was successfully saved!');

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question=Question::find($id);
        return view ('questions.show')->withQuestion($question);
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

    public function filter($orderBy){
        if($orderBy == "Newest"){

            $questions = Question::orderBy('created_at', 'desc')->get();
        }
        elseif ($orderBy == "A-Z" ){
            $questions = Question::orderBy('title')->get();

        }
        elseif ($orderBy == "Z-A"){
            $questions = Question::orderBy('title' ,'desc')->get();


        }
        return view ('questions.index')->withQuestions($questions);
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
        
        $question=Question::find($id);

        $evaluations=$question->allEvaluations;

        $answers=$question->allAnswers;

        foreach($evaluations as $eval){
            $eval->delete();
        }

        foreach($answers as $answer){
            $answer->delete();
        }
        
        $question->delete();

        return redirect()->route('questions.index');
        
    }
    
}
