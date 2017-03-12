<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Auth;
use Session;


class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $resources=Resource::orderBy('id', 'DESC')->paginate(10);

        return view('resources.index')->with('resources',$resources);

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

        $this -> validate($request ,array(
                'title' => 'required | max:50|unique:questions',
                'content'  => 'required | max:500'
            )); 
        $resource = new Resource();
        $file = $request->file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $resource->title = $request->title;
        $resource->content = $request->content;
        $resource->category_id = $request->category_id;
        $resource->user_id = Auth::user()->id;
        
        $resource->mime = $file->getClientMimeType();
        $resource->original_filename = $file->getClientOriginalName();
        $resource->filename = $file->getFilename().'.'.$extension;
        $resource->save();
        Session::flash('success','Your resource was successfully saved!');
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

    public function get($filename){
        $entry = Resource::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);
        return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);

    }
    public function filter($orderBy){
        if($orderBy == "Newest"){

            $resources = Resource::orderBy('created_at', 'desc')->get();
        }
        elseif ($orderBy == "A-Z" ){
            $resources = Resource::orderBy('title')->get();

        }
        elseif ($orderBy == "Z-A"){
            $resources = Resource::orderBy('title' ,'desc')->get();


        }
        return view ('resources.index')->withResources($resources);
    }
}
