<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
        return view ('pages.welcome')->withQuestions($questions);
    }
}
