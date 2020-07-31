<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('to',auth()->user()->email)->get();
        // $messages = Message::all();
        return view('admin.messages.inbox',compact('messages')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$emails = User::pluck('email') ;
        return view('admin.messages.create',compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(array(
            'email' => 'required|email',
            'subject'=>"required|string|max:150",
            'body'=>"required|string|max:1500"
        ));
        $data = $request->all();
        $message = Message::create([
            'user_id' => auth()->user()->id ,
            'from' => auth()->user()->email ,
            'to' => $data['email'],
            'subject'=>$data['subject'],
            'slug'=> Str::slug($data['subject']) ,
            'body'=>$data['body']
        ]) ;
        return back()->with('success',"send successfully") ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $message = Message::where('slug',$slug)->first();

        return view('admin.messages.show',compact('message')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $message = Message::where('slug',$slug)->first();
        $message->delete();

        return redirect()-> route('messages.index')->with('success',"deleted successfully") ;

    }
}
