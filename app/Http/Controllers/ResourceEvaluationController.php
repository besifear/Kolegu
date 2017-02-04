<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResourceEvaluation;
use App\User;
use App\Resource;
use Auth;
use Session;
use Redirect;


class ResourceEvaluationController extends Controller
{
     public function upVote(Request $request){
        if(Auth::guest())
            return view('auth.login');
        if (Auth::user()->reputation==null){
            $useri = User::find(Auth::user()->id);
            $useri->reputation=0;
            $useri->save();
        }

        $resourceEv=ResourceEvaluation::where([
            ['resource_id','=',$request->resource_id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($resourceEv)==null) {
            $resourceEv = new ResourceEvaluation;
            $resourceEv->vote = 'Yes';
            $resourceEv->resource_id= $request->resource_id;
            $resourceEv->user_id = Auth::user()->id;
            $resourceEv->save();
            $resourceAskingUser= User::find((Resource::find($request->resource_id))->user_id);
            $resourceAskingUser->reputation+=1;
            $resourceAskingUser->save();

        }else {
            if ($resourceEv->vote != 'Yes') {
                $resourceEv->vote = 'Yes';
                $resourceEv->save();
                $resourceAskingUser= User::find((Resource::find($request->resource_id))->user_id);
                $resourceAskingUser->reputation+=2;
                $resourceAskingUser->save();

            } else{
                $resourceEv->delete();
                $resourceAskingUser= User::find((Resource::find($request->resource_id))->user_id);
                $resourceAskingUser->reputation-=1;
                $resourceAskingUser->save();
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

        $resourceEv=ResourceEvaluation::where([
            ['resource_id','=',$request->resource_id],
            ['user_id','=',Auth::user()->id],
        ])->first();

        if(($resourceEv)==null) {
            $resourceEv = new ResourceEvaluation;
            $resourceEv->vote = 'No';
            $resourceEv->resource_id= $request->resource_id;
            $resourceEv->user_id = Auth::user()->id;
            $resourceEv->save();
            $resourceAskingUser= User::find((Resource::find($request->resource_id))->user_id);
            $resourceAskingUser->reputation-=1;
            $resourceAskingUser->save();

        }else {
            if ($resourceEv->vote != 'No') {
                $resourceEv->vote = 'No';
                $resourceEv->save();
                $resourceAskingUser= User::find((Resource::find($request->resource_id))->user_id);
                $resourceAskingUser->reputation-=2;
                $resourceAskingUser->save();

            } else{
                $resourceEv->delete();
                $resourceAskingUser= User::find((Resource::find($request->resource_id))->user_id);
                $resourceAskingUser->reputation+=1;
                $resourceAskingUser->save();
            }

        }
        

        return Redirect::back();
    }
        
}
        
    /*
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
    */

