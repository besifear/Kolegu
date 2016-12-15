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
        if(Auth::guest())
            return view('auth.login');
        


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
        //qetu kthehet arrayi prej databazes per kategorite qe kane mbet te pazgjedhuna prej userit
        $categories=Category::distinct()->whereNotIn('categories.id',
            Category::join('selectedcategories','category_id','=','categories.id')->distinct()
            ->where('user_id','=',Auth::user()->id)->get(['categories.id'])
        )->get(['categories.id','name','description']);

        /*
            OLD QUERY per gjdo rast mos e fshij !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $categories=Category::leftJoin('SelectedCategories','category_id','=','categories.id')->distinct()
            ->where('user_id','!=',Auth::user()->id)->orWhereNull('user_id')->get(['categories.id','name','description']);
        */

        //qetu kthehen arrayi prej databazes per kategorite qe i ka zgjedh useri.
        $userCategories=SelectedCategory::where('user_id','=',Auth::user()->id)->get();

            return view ('categories.categoriesuser')->with(
                array('categories'=>$categories,'userCategories'=>$userCategories));
        }

        /*
          Metoda selectCategory nqs nuk e ka t'zgjedht qet kategori shkon ja shton te selected categories
          nqs e ka ne selected categories edhe e selekton ather e hek prej atyhit
        */
    public function selectCategory($category_id){
        // e lyp ndatabaze
        $selectedCategory=SelectedCategory::where([
                ['category_id', $category_id],
                ['user_id',Auth::user()->id]
            ])->first();

        //e kqyr a o null
        if($selectedCategory==null){

            // nqs sosht athere e krijon ndatabaze 1 rresht te selectedCategory qe tregon qe qeky user e ka zgjedh qet kategori
        SelectedCategory::create([
             'category_id'=>$category_id,
             'user_id'=>Auth::user()->id
        ]);

        }else{
            //perndryshe nqs ekziston qajo selectedcategori ather i bjen qe useri o ka don me e fshi qat selectedcategory
             SelectedCategory::where([
                 ['category_id', $category_id],
                 ['user_id',Auth::user()->id]
             ])->delete();
        }

        return redirect('/Kategorite');
    }
}
