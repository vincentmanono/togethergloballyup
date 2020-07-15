<?php

namespace App\Http\Controllers;

use App\Chama;
use App\Tikect;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TikectController extends Controller
{


    public function voted(Request $request ,$chama_id,User $user)
    {
        $chama = Chama::where('id',$chama_id)->first();

        $tikect = Tikect::where('chama_id',$chama->id)->where('user_id',$user->id);

        $tikect->pay =  $request->pay ;

        if ( $request->pay == "on" ) {
            $tikect->given = true ;
        }


        if (  $tikect->save()) {
           $request->session()->flash('success', "You voted successfully");
        }else{
            $request->session()->flash('error', "Please try again");
        }

        return back();


    }



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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tikect  $tikect
     * @return \Illuminate\Http\Response
     */
    public function show(Tikect $tikect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tikect  $tikect
     * @return \Illuminate\Http\Response
     */
    public function edit(Tikect $tikect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tikect  $tikect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tikect $tikect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tikect  $tikect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tikect $tikect)
    {
        //
    }
}
