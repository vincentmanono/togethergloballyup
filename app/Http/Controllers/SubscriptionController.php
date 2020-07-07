<?php

namespace App\Http\Controllers;

use App\payment\MpesaGateway;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if ( auth()->user()->role == 'super' ) {
            $subscriptions = Subscription::orderBy('created_at', 'DESC')->paginate(100);
            return view('admin.subscriptions.allSubscriptions',compact('subscriptions')) ;
        } else {
           $subscriptions = Subscription::where('user_id',auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(100);
           return view('admin.subscriptions.mySubscription',compact('subscriptions'));
        }


    }

    public function renew(Request $request, MpesaGateway $mpesaGateway){
        request()->validate(array( //|regex:/(^(\d+){1,10})/u
            'phone' => 'required|numeric',
        ));
        $amount = 1;
        $phone = $request->phone;

      $response =   $mpesaGateway->make_payment($phone,$amount) ;


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
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
