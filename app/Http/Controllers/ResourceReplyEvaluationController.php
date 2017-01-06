<?php

namespace App\Http\Controllers;

use App\ResourceReply;
use App\ResourceReplyEvaluation;

use Illuminate\Http\Request;


use Auth;
use Session;

class ResourceReplyEvaluationController extends Controller
{
    
    public function upVote(Request $request)
    {
        if (Auth::guest())
            return view('auth.login');

        $resourceReplyEvaluation = ResourceReplyEvaluation::where([
            ['resourcereply_id', '=', $request->resourceReplyId],
            ['user_id', '=', Auth::user()->id],
        ])->first();

        if (($resourceReplyEvaluation) == null) {
            $resourceReplyEvaluation = new ResourceReplyEvaluation;
            $resourceReplyEvaluation->vote = 'Yes';
            $resourceReplyEvaluation->resourcereply_id = $request->resourceReplyId;
            $resourceReplyEvaluation->user_id = Auth::user()->id;
            $resourceReplyEvaluation->save();
        } else {
            if ($resourceReplyEvaluation->vote != 'Yes') {
                $resourceReplyEvaluation->vote = 'Yes';
                $resourceReplyEvaluation->save();
            } else
                $resourceReplyEvaluation->delete();
        }
        return Redirect()->back();
    }

        public function downVote(Request $request){
            if(Auth::guest())
                return view('auth.login');

            $resourceReplyEvaluation=ResourceReplyEvaluation::where([
                ['resourcereply_id','=',$request->resourceReplyId],
                ['user_id','=',Auth::user()->id],
            ])->first();

            if(($resourceReplyEvaluation)==null) {
                $resourceReplyEvaluation = new ResourceReplyEvaluation;
                $resourceReplyEvaluation->vote = 'No';
                $resourceReplyEvaluation->resourcereply_id= $request->resourceReplyId;
                $resourceReplyEvaluation->user_id = Auth::user()->id;
                $resourceReplyEvaluation->save();
            }else {
                if ($resourceReplyEvaluation->vote != 'No') {
                    $resourceReplyEvaluation->vote = 'No';
                    $resourceReplyEvaluation->save();
                } else
                    $resourceReplyEvaluation->delete();
            }


            return Redirect()->back();
    }
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
        //
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
