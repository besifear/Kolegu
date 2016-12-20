<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\User;

use Auth;
use Redirect;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=='Admin')
            return view('suggestions.index')->withSuggestions(Suggestion::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Suggestion::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>$request->user_id
        ]);

        return Redirect::back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        if(Auth::user()->role=='Admin'){
            $suggestion=Suggestion::find($id);
            return view ('suggestions.show')->with(array(
                'suggestion'=>$suggestion,
                'sender'=>User::find($suggestion->user_id)
            ));
        }
        return redirect::back();
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
        if(Auth::user()->id=='Admin')
            Suggestion::find($id)->delete();
    }
}
