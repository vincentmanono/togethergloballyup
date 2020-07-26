<?php

namespace App\Http\Controllers;

use App\Chama;
use App\Ticket;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class TicketController extends Controller
{


    public function voted(Request $request )
    {

        $user = User::find($request->user_id) ;
        $chama = Chama::find( $request->chama_id);
        // $ticket = Ticket::where('chama_id',$chama->id)->where('user_id',$user->id)->get();

        if ( $request->pay == 'yes' ) {

        Ticket::where('chama_id',$chama->id)
        ->where('user_id',$user->id)
        ->update(['pay' => true, 'given'=> true ,'as_vote'=>true]);
        }else {
            Ticket::where('chama_id',$chama->id)
            ->where('user_id',$user->id)
            ->update(['pay' => 0 , 'as_vote'=>true ]);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'You voted successfully'
            ]) ;


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


    public function store(Request $request)
    {
        //
    }


    public function show(ticket $ticket)
    {
        //
    }


    public function edit(ticket $ticket)
    {
        //
    }

    public function update(Request $request, ticket $ticket)
    {
        //
    }


    public function destroy(ticket $ticket)
    {
        //
    }
}
