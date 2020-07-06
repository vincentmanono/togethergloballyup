<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $testimonies = Testimony::orderBy('id','DESC')->get();

        return view('admin/testimony.index')->with('testimonies',$testimonies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/testimony.create');
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
        $this -> validate($request,[
            'body'=>'required|string|max:1000'

        ]);

        $post = new Testimony();
        $post->user_id=auth()->user()->id;
        $post->body=$request->input('body');




        $post->user_id = auth()->user()->id ;

        $validate=$post->save();
        if($validate){
            return redirect('/testimonies')->with('success','Testimony created successfully') ;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $single = Testimony::findorfail($id);

        return view('admin/testimony/edit')->with('single',$single);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single = Testimony::findorfail($id);

        return view('admin/testimony/edit')->with('single',$single);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $this -> validate($request,[
            'body'=>'required|string|max:1000'

        ]);

        $post =  Testimony::find($id);
        $post->user_id = auth()->user()->id ;
        $post->body=$request->input('body');
        $validate=$post->save();

        if($validate){
            return redirect('/testimonies')->with('success','Testimony updated successfully') ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Testimony::find($id);
        $data->delete();

        return redirect('/testimonies')->with('success','Testimony deleted successfully') ;

    }
}
