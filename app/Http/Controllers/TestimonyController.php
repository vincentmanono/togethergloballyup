<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        // $this->authorizeResource(Testimony::class,'testimony') ;
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
        else{
            return redirect('/testimonies')->with('error','Testimony not added, please retry');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show( Testimony $testimony)
    {
        $single = $testimony ;
        $this->authorize('view',$testimony) ;

        return view('admin/testimony/show')->with('single',$single);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimony $testimony)
    {

        $single = $testimony ;
        $this->authorize('update',$testimony) ;

        if ( auth()->user()->id == $single->user_id ) {
            # code...
            return view('admin/testimony/edit')->with('single',$single);
        } else {
            Session::flash('error',"You cant edit other members testimony") ;
            return back();
        }




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimony $testimony )
    {

        $this -> validate($request,[
            'body'=>'required|string|max:1000'

        ]);



        if (auth()->user()->role == "super" ||  auth()->user()->id != $testimony->user_id ) {

            Session::flash('error',"You cant edit other members testimony") ;
            return back();
        }

        $this->authorize('update',$testimony) ;

        $post = Testimony::findOrFail($testimony->id )  ;


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
    public function destroy( Testimony $testimony)
    {
        $this->authorize('delete',$testimony) ;
        $data = Testimony::findOrFail($testimony->id )  ;

        if (auth()->user()->role == "super" ||  auth()->user()->id != $data->user_id ) {

            Session::flash('error',"You cant delete other members testimony") ;
            return back();
        }
        $data->delete();

        return redirect('/testimonies')->with('success','Testimony deleted successfully') ;

    }
}
