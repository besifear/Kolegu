<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Achievement;

use Auth;
use Session;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest())
            return view('auth.login');
        


        $achievements=Achievement::all();

        return view('achievements.index')->withAchievements($achievements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::guest())
            return view('auth.login');
        if(!auth::user()->role=='Admin')
            return redirect('/');

        return view('achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(auth::guest())
            return view('auth.login');
         //validate data
        $this -> validate($request ,array(
                'description' => 'required | max:300',
                'reputationaward' => 'required | numeric'
            ));

        //save to database
        
        $achievement=new Achievement;

        

        $achievement->description = $request->description;
        $achievement->reputationaward = $request->reputationaward;
        $achievement->difficulty = $request->difficulty;

        

        $achievement->save();
        //redirect to another page

        Session::flash('success','Your achievement was successfully saved!');

        return redirect()->route('achievements.index');
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
        Achievement::find($id)->delete();
        return redirect('/achievements');
    }
}
