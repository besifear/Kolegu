<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
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
        Message::create([
            'subject'=>$request->subject,
            'content'=>$request->content,
            'status'=>'no',
            'reciever_id'=>$request->reciever_id,
            'sender_id'=>Auth::user()->id
        ]);

        return redirect()->action(
            'UserController@show', ['id' => $request->reciever_id]
        )->with('message','Message was sent sucsessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $message=Message::find($id);
        $user_id=Auth::user()->id;
        if($user_id==$message->sender_id || $user_id==$message->reciver_id) {
            $sender=User::find($message->sender_id);
            $message->status='yes';
            $message->save();

            return view('messages.show')->with(array(
                'message' => $message,
                'sender'=> $sender
            ));
        }

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
        Message::find($id)->delete();
        return redirect()->route('messages.index');
    }
}
