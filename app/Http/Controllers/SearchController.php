<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Resource;
use App\User;
use Session;
class SearchController extends Controller
{
    public function search(Request $word)
    {
        

        $questions=Question::where('title', 'like', '%'.$word->word.'%')->orWhere('content', 'like', '%'.$word->word.'%')->get();

        $resources=Resource::where('title', 'like', '%'.$word->word.'%')->orWhere('content', 'like', '%'.$word->word.'%')->get();

        return view('searches.index')->with('questions',$questions)->with('resources',$resources);
    }
    
    public function searchForJSON(Request $request){
   		if(strlen($request->word) === 0){
   			return null;
   		}
   		
    	$questions=Question::where('title', 'like', '%'.$request->word.'%')->orWhere('content', 'like', '%'.$request->word.'%')->take(5)->get();
    	
    	$resources=Resource::where('title', 'like', '%'.$request->word.'%')->orWhere('content', 'like', '%'.$request->word.'%')->take(5)->get();
    	return response()->json(compact('questions', 'resources'));    	
    }

    public function searchusers(Request $word)
    {	
    	$users=User::where('username', 'like', '%'.$word->word.'%')->orWhere('email', 'like', '%'.$word->word.'%')->get();
    	if(count($users)>=2){
    		$halfusers = $users->chunk(count($users)/2);
       		$halfusers->toArray();
       		return view('users.index')->with('halfusers0',$halfusers[0])->with('halfusers1',$halfusers[1]);
       	}
       	else if(count($users)==1){
			
       		return view('users.index')->with('halfusers0',$users)->with('halfusers1',$users);
       	}	 
       	else if(count($users)==0){
       		return view('users.index')->with('halfusers0',$users)->with('halfusers1',$users);
    	}
     }
}
