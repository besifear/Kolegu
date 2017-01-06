<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resource;
use App\Category;
use Session;
use Auth;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        return view('resources.index')->withResources($resources);
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
        $categories=Category::all();
        return view('resources.create')->withCategories($categories);
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
            'title' => 'required | max:50|unique:resources',
            'content'  => 'required | max:500',
        ));

        //save to database

        $resource=new Resource;



        $resource->title = $request->title;
        $resource->content = $request->content;
        $resource->category_id = $request->category_id;
        $resource->user_id = Auth::user()->id;



        //Category::create([$category]);

        $resource->save();
        //redirect to another page

        Session::flash('success','Your question was successfully saved!');

        return redirect()->route('resources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View('resources.show')->withResource(Resource::find($id));
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
        Resource::find($id)->delete();
        return redirect('/resources');
    }
}
