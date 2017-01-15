<?php

namespace App\Http\Controllers;

use App\ResourceReply;
use App\ResourceReplyEvaluation;
use Illuminate\Http\Request;
use Auth;
use Session;

class ResourceReplyController extends Controller
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
        if(Auth::guest())
            return View("auth.login");

        ResourceReply::create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'resource_id'=>$request->id
          ]);
        return redirect()->back();
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
        $resourceReply=ResourceReply::find($id);
        if($resourceReply!=null){
            $evaluations=$resourceReply->votes;
            foreach ($evaluations as $evaluation){
               $evaluation->delete();
            }
            $resourceReply->delete();
        }
        return redirect()->back();
        /*
         ->delete();
        $resourceReply->delete();

        */

    }
}
