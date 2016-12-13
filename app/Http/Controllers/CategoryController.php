<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\SelectedCategory;

use Session;

use Auth;

class CategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth::guest())
            return view('auth.login');
        if(!auth::user()->role=='Admin')
            return redirect('/');


        $categories=Category::all();

        return view('categories.index')->withCategories($categories);
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

        return view('categories.create');
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
        if(!auth::user()->role=='Admin')
            return redirect('/');

        //validate data
        $this -> validate($request ,array(
                'name' => 'required | max:50',
                'description'  => 'required | max:200'
            ));

        //save to database
        
        $category=new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        

        //Category::create([$category]);

        $category->save();
        //redirect to another page

        Session::flash('success','Your category was successfully saved!');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        return view ('categories.show')->withCategory($category);
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

    public function seeCategories(){

        $categories=Category::leftJoin('SelectedCategories','category_id','=','categories.id')
            ->where('user_id','NOT CHECK IN',Auth::user()->id)->orWhereNull('user_id')->get(['categories.id','name','description']);



        /*foreach($categories as $category){
            echo $category;
        }
        */

    $userCategories=SelectedCategory::where('user_id','=','1') ->get();


    return view ('categories.categoriesuser')->with(array('categories'=>$categories,'userCategories'=>$userCategories));



        }

    public function selectCategory($category_id){
        $selectedCategory=SelectedCategory::where([
                ['category_id', $category_id],
                ['user_id',Auth::user()->id]
            ])->first();

        if($selectedCategory==null){

        SelectedCategory::create([
             'category_id'=>$category_id,
             'user_id'=>Auth::user()->id
        ]);

        }else{
             SelectedCategory::where([
                 ['category_id', $category_id],
                 ['user_id',Auth::user()->id]
             ])->delete();
        }

        return redirect('/Kategorite');
    }
}
