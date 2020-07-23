<?php

namespace App\Http\Controllers;

use App\User;
use App\Chama;
use App\Ticket;
use App\Wallet;
use App\ChamaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ChamaStoreRequest;

class ChamaController extends Controller
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

    public function chamaJoin(Request $request){
        $user = User::find(auth()->user()->id)  ;
        $chama = Chama::find($request->input('chamaID'))  ;
        $asthischama= ChamaUser::where('user_id',$user->id)->where('chama_id',$chama->id)->count() ;
        if ($asthischama ) {
            $request->session()->flash('error', "You are member in this chama");
           return back() ;
        }
        $user->chamaSubscribed()->attach([$chama->id]);
        $user->tickets()->create([
            'chama_id' => $chama->id,
            'given'=>false,
            'as_vote'=>false

        ]);
        $request->session()->flash('success', "You have successfully subscribed to " . $chama->name);

        return back();

    }
    public function exitChama(Request $request){
        $user = auth()->user() ;
        $chama = Chama::find($request->input('chamaID'))  ;
        $user->chamaSubscribed()->detach([$chama->id]);
        $request->session()->flash('success', "You have successfully exit from  " . $chama->name . " chama");

        return back();

    }


    public function subscribedChama()
    {

        $chamas = auth()->user()->chamaSubscribed;

        return view('admin.chama.subscribed')->with('chamas',$chamas) ;
    }

    public function singleSubscribedChama(Chama $chama){
        $user =auth()->user() ;
        $chama = Chama::findOrFail($chama->id);
        $wallet = Auth::user()->wallet ;
        $shouldvote = Ticket::where('chama_id',$chama->id)->where('user_id',$user->id)->first();
        // return $shouldvote->given ;
        return view('admin.subscriptions.SingleChama',compact('chama','wallet','shouldvote')) ;
    }



    public function takevote($chama_id)
    {
        $chama = Chama::where('id',$chama_id) ->where('openVote',true)->get();
        $user =auth()->user() ;

        if ( $chama->count() < 1 ) {
            Session::flash('error',"Please contact chama admin for more information ");
            return redirect()->route('user.chama.subscribed.single',$chama_id) ;
        }


        $shouldvote = Ticket::where('chama_id',$chama->id)->where('user_id',$user->id)->first();
        // return $shouldvote->given ;
        if ($shouldvote->given  == 1 ) {
           Session::flash('error',"you can't vote until all members  win like you");
           return redirect()->route('user.chama.subscribed.single',$chama->id) ;
        } else if($shouldvote->as_vote == 1) {

            Session::flash('error',"you have already voted . Wait for next round");
            return redirect()->route('user.chama.subscribed.single',$chama->id) ;

        }else{
            return view( 'admin.chama.tikects.vote', compact('chama') );
        }





    }

    public function vote(){
        $chama =  Chama::find(8);
        $members= $chama->users->pluck('id') ;
        $now = now()->format('Y-m-d H:i:s');
        return $members ;
    }




    public function index()
    {
        $user = auth()->user()->role == "super" ;
        if ($user ) {
            $chamas = Chama::all() ;
        } else {
            $chamas = Chama::where('activate',true)->get();
        }



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
    public function store(ChamaStoreRequest $request)
    {
        $user = User::find(auth()->user()->id) ;
        $chama = new Chama();
        $chama->name= $request->input('name');
        $chama->amount= $request->input('amount');
        $chama->description = $request->input('description');
        $chama->user_id = $user->id ;
        if ($chama->save() ) {
            $user->role = 'admin';
            $user->save();

            $user->chamaSubscribed()->attach([$chama->id]);
            $user->tickets()->create([
                'chama_id' => $chama->id,
                'given'=>false,
                'as_vote'=>false

            ]);

             $request->session()->flash('success', "Your chama created successfully");
             return redirect()->route('admin.chama.show',$chama->id) ;
        } else {
            $request->session()->flash('error', "Error occurred please try again");
            return back();
        }
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
        $this->authorize('update',$chama) ;
        $chama = Chama::findOrFail($chama->id);

        $this -> validate($request,[
            'name'=>'required|string|max:150',
            'amount'=>'required|numeric',
            'description'=>'nullable|min:5'
        ]);

        if ($chama->user_id == auth()->user()->id || auth()->user()->role == 'super' ) { //
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
         $this->authorize('delete',$chama) ;
        if ($chama->user_id == auth()->user()->id || auth()->user()->role == 'super') {
            if (  $chama->delete()) {
            return redirect()->route('admin.chama') ->with('success','Chama details deleted successfully') ;

     }
        }
        else {
         return back()->with('error','Error occurred') ;
     }
    }
}
