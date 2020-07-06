<?php

namespace App\Http\Controllers;

use App\Chama;
use Illuminate\Http\Request;

class ChamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chamas = Chama::all() ;
        return view('admin.chama.chamas')->with('chamas',$chamas) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chama.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chama  $chama
     * @return \Illuminate\Http\Response
     */
    public function show(Chama $chama)
    {
        $chama = Chama::find($chama->id);
        return view('admin.chama.show',compact('chama')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chama  $chama
     * @return \Illuminate\Http\Response
     */
    public function edit(Chama $chama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chama  $chama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chama $chama)
    {
        $chama = Chama::findOrFail($chama->id);

        $this -> validate($request,[
            'name'=>'required|string|max:150',
            'amount'=>'required|numeric',
            'description'=>'nullable|min:5'
        ]);

        if (true ) { //$chama->user_id == auth()->user()->id
            $chama->name = $request->name ;
            $chama->amount = $request->amount ;
            $chama->description = $request->description ;

            if (  $chama->save()) {
               return back()->with('success','Chama details updated successfully') ;
            }
            return back()->with('error','Error occurred Please try again') ;
        } else {
            return back()->with('error','You cant updated other people chama') ;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chama  $chama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chama $chama)
    {
        $chama = Chama::findOrFail($chama->id);
        if (  $chama->delete()) {
            return redirect()->route('admin.chama') ->with('success','Chama details deleted successfully') ;

     } else {
         return back()->with('error','Error occurred') ;
     }
    }
}
