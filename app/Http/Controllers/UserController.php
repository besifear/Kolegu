<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

use Mail;

use Redirect;

use Image;

use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users=User::all();
        return view('users.index',compact('users'));
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

    public function sendEmail()
    {
        $user = Auth::user();

        Mail::send('questions/indexanswered', ['user' => $user], function ($m) use ($user) {
            $m->from('edonzi@outlook.com', 'Your Application');

        $m->to($user->email, $user->name)->subject('Po bojka o baaab!');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $questions = \App\Question::where('user_id','=',$user->id)->paginate(5);
        $answers = \App\Answer::where('user_id','=',$user->id)->paginate(5);
        $resources = \App\Resource::where('user_id','=',$user->id)->paginate(5);
        $achievements = \App\Achievement::all();
        $selectedcategories = \App\SelectedCategory::where('user_id','=',$user->id)->get();
        return view ('profiles.show',compact('user','questions','answers', 'resources','achievements','selectedcategories'));
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
        $user = User::find($id);
        $user->update($request->all());
        return redirect("users/$id");
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

    /*update avatar method*/
    public function update_avatar(Request $request) {
        
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(Auth::user()->id);

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            if ($user->avatar !== 'profilepicture.png') {
                $file = public_path('/images/avatars/' . $user->avatar);

                if (File::exists($file)) {
                    unlink($file);
                }
            }

            Image::make($avatar)->fit(150, 150)
            	->save( public_path('/images/avatars/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        $user=Auth::user();
        $questions = \App\Question::where('user_id','=',$user->id)->paginate(5);
        $answers = \App\Answer::where('user_id','=',$user->id)->paginate(5);
        $resources = \App\Resource::where('user_id','=',$user->id)->paginate(5);
        $achievements = \App\Achievement::all();
        $selectedcategories = \App\SelectedCategory::where('user_id','=',$user->id)->get();
        return view ('profiles.show',compact('user','questions','answers', 'resources','achievements','selectedcategories'));
    }
}
