<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscribeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscribe::orderBy('created_at', 'DESC')->paginate(100);
        return view('admin.subscriptions.mySubscription',compact('subscriptions')) ;
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
    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email'
        ]);
        $email = $request->input('email') ;
       $check =  Subscribe::where('email',$email)->count();
       if ( $check > 0) {

           return response()->json(
            [
              'success' => false,
              'message' => 'You already regestered to our news letter'
            ]
          );

       } else {
           $subscribe = new Subscribe();
            $subscribe->email=$request->input('email');
            if($subscribe->save()){
                return response()->json(
                    [
                      'success' => true,
                      'message' => 'You have successfuly subscribed to our newsletters.'
                    ]
                  );

            }
       }

       return back() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {

        // $this->authorize('delete',$subscribe) ;
        // $data = Subscribe::findOrFail($subscribe->email )  ;

        // if (auth()->user()->role == "super" ||  auth()->user()->id != $data->user_id ) {

        //     Session::flash('error',"You cant delete the email if you are not the super admin") ;
        //     return back();
        // }
        // $data->delete();

        // return redirect('/mysubscriptions')->with('success','Email deleted successfully') ;
    }
}
