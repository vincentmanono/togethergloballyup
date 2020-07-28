<?php

namespace App\Http\Controllers;

use App\Chama;
use App\Notifications\VotingNotification;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class AdminChamaController extends Controller
{
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
        if($chama->nextVote != null && $chama->nextVote > $now){
            Session::flash('error',"You can't Open Voting before end of set duration days ") ;
            return back();
        }
        else{
            $chama->nextVote = date('Y-m-d H:i:s', strtotime('+' . $days . ' day', strtotime($now)));
        }


        if($chama->save()){

            $tickets = Ticket::where('chama_id',$chama->id)->get() ;
           foreach ($tickets as $key => $ti) {
               $ticket = Ticket::find($ti->id) ;
               $ticket->pay = false ;
               $ticket->given = false ;
               $ticket->as_vote = false ;
               $ticket->save();
           }

            Session::flash('success',"Now members can start to vote successfully");
            $users = $chama->users ;
            foreach ($users as $key => $user) {

                Notification::send($user , new VotingNotification($chama,$user)) ;
            }

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
        $request->session()->flash('success', "You have successfully removed ".$user->firstName." from   chama");

        return back();

    }
}
