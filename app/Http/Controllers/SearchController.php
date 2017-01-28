<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Resource;
use App\User;

class SearchController extends Controller
{
    public function search(Request $word)
    {
        

        $questions=Question::where('title', 'like', '%'.$word->word.'%')->orWhere('content', 'like', '%'.$word->word.'%')->get();

        $resources=Resource::where('title', 'like', '%'.$word->word.'%')->orWhere('content', 'like', '%'.$word->word.'%')->get();

        return view('searches.index')->with('questions',$questions)->with('resources',$resources);
    }
}
