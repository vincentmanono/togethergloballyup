<?php

namespace App\Http\Controllers;

use App\User;
use App\Chama;
use App\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Notifications\VotingNotification;
use Illuminate\Support\Facades\Notification;

class AdminChamaController extends Controller
 {
    public function activateJoin($chama)
    {

        $chama = Chama::where('id',$chama)->first();

        if ( $chama ) {
            # code...
            $chama->confirmedjoining  = 1 ;
            $chama->save();
            Session::flash('success',"New members can join");
            return back();
        } else {
            Session::flash('error','Please contact system admin for more info');
            return back() ;
        }



    }
    public function deactivateJoin($chama)
    {

        $chama = Chama::where('id',$chama)->first();
        if ( $chama ) {
            # code...
            $chama->confirmedjoining  = 0;
            $chama->save();
            Session::flash('success',"Chama joining deactivated");
            return back();
        } else {
            Session::flash('error','Please contact system admin for more info');
            return back() ;
        }

    }
    public function chamaCodeModify($chama)
    {
        $chama = Chama::where('id',$chama)->first();
        if ( $chama ) {

            $chama->chamacode  = Str::random(6) ;
            $chama->authorizationcode  = Str::random(6);
            $chama->save();
            Session::flash('success',"Chama codes modified");
            return back();
        } else {
            Session::flash('error','Please contact system admin for more info');
            return back() ;
        }


    }
    public function sharecode($chama)
    {
        $chama = Chama::where('id',$chama)->first();
        $emails = User::pluck('email') ;
        if ( $chama ) {
            return view('admin.chama.AdminChama.composeShare',compact('chama','emails'));
        } else {
            Session::flash('error','Please contact system admin for more info');
            return back() ;
        }

    }
    public function allmychama()
    {

        $user = User::find(auth()->user()->id) ;
        $chamas =$user->allMyChama ;

        return view('admin/chama/AdminChama/index')->with('chamas',$chamas)  ;

    }

    public function show($id)
    {
        $chama = Chama::find($id) ;
        //   $this->authorize('view',$chama) ;
        return view('admin.chama.AdminChama.show',compact('chama')) ;

    }

    public function openvoting($id)
    {

        $chama = Chama::findOrFail($id);
        $this->authorize('update',$chama) ;
        $chama->openVote = true ;


        $days = $chama->duration;
        $now = now()->format('Y-m-d H:i:s');
        // if($chama->nextVote != null && $chama->nextVote > $now){
        //     Session::flash('error',"You can't Open Voting before end of set duration days ") ;
        //     return back();
        // }
        // else{
        //     $chama->nextVote = date('Y-m-d H:i:s', strtotime('+' . $days . ' day', strtotime($now)));
        // }

        if($chama->save()){


            $ticketsAllCount = Ticket::where('chama_id',$chama->id)->count();
            $ticketsGiventCount = Ticket::where('chama_id',$chama->id)->where('given',true)->count();
            if ( $ticketsAllCount ==  $ticketsGiventCount  ) {
                $tickets = Ticket::where('chama_id',$chama->id)->get() ;
                foreach ($tickets as $key => $ti) {
                    $ticket = Ticket::find($ti->id) ;
                    $ticket->pay = false ;
                    $ticket->given = false ;
                    $ticket->as_vote = false ;
                    $this->notifyUserToVote($ticket->user,$ticket->chama);
                    $ticket->save();
                }
            } else {
                $tickets = Ticket::where('chama_id',$chama->id)->where('given',false)->get() ;
                foreach ($tickets as $key => $ti) {
                    $ticket = Ticket::find($ti->id) ;
                    $ticket->pay = false ;
                    $ticket->as_vote = false ;
                    $this->notifyUserToVote($ticket->user,$ticket->chama);
                    $ticket->save();
                }

            }
            Session::flash('success',"Now members can start to vote successfully");

        }else{
            Session::flash('error',"Error occurred try again");
        }

         return back();
    }

    public function removeUser( Request $request )
    {
        $user = User::find($request->userId) ;
        $chama = Chama::find($request->chamaId) ;

        $user->chamaSubscribed()->detach([$chama->id]);
        $request->session()->flash('success', "You have successfully removed ".$user->name." from   chama");

        return back();

    }

    public function notifyUserToVote($user,$chama){

            Notification::send($user , new VotingNotification($chama,$user)) ;


    }
}
