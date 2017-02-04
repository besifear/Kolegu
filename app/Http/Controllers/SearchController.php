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

    public function searchusers(Request $word)
    {	
    	$users=User::where('username', 'like', '%'.$word->word.'%')->orWhere('email', 'like', '%'.$word->word.'%')->get();
    	
    		$halfusers = $users->chunk(count($users)/2);
       		$halfusers->toArray();

        return view('users.index')->with('halfusers0',$halfusers[0])->with('halfusers1',$halfusers[1]);
    	
       
    }
}
