<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResourceEvaluation;
use Auth;
use Session;

class ResourceEvaluationController extends Controller
{

    public function upVote(Request $request)
    {
        if (Auth::guest())
            return view('auth.login');

        $resourceEvaluation = ResourceEvaluation::where([
            ['resource_id', '=', $request->resource_id],
            ['user_id', '=', Auth::user()->id],
        ])->first();

        if (($resourceEvaluation) == null) {
            $resourceEvaluation = new ResourceEvaluation;
            $resourceEvaluation->vote = 'Yes';
            $resourceEvaluation->resource_id = $request->resource_id;
            $resourceEvaluation->user_id = Auth::user()->id;
            $resourceEvaluation->save();
        } else {
            if ($resourceEvaluation->vote != 'Yes') {
                $resourceEvaluation->vote = 'Yes';
                $resourceEvaluation->save();
            } else
                $resourceEvaluation->delete();
        }
        return redirect()->back();
    }

    public function downVote(Request $request){
        if(Auth::guest())
            return view('auth.login');

        $resourceEvaluation=ResourceEvaluation::where([
            ['resource_id','=',$request->resource_id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($resourceEvaluation)==null) {
            $resourceEvaluation = new ResourceEvaluation;
            $resourceEvaluation->vote = 'No';
            $resourceEvaluation->resource_id= $request->resource_id;
            $resourceEvaluation->user_id = Auth::user()->id;
            $resourceEvaluation->save();
        }else {
            if ($resourceEvaluation->vote != 'No') {
                $resourceEvaluation->vote = 'No';
                $resourceEvaluation->save();
            } else
                $resourceEvaluation->delete();
        }


        return redirect()->back();
    }
    
}
