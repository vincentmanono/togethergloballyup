<?php

namespace App\Http\Controllers;

use App\User;
use App\Chama;
use App\Ticket;
use App\Wallet;
use App\Jobs\PayUser;
use App\Notifications\PayUsNotification;
use Illuminate\Http\Request;
use App\Notifications\UserWon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{


    public function voted(Request $request)
    {



        $user = User::find($request->user_id);
        $chama = Chama::find($request->chama_id);



        $getAmount  = 0;
        // $ticket = Ticket::where('chama_id',$chama->id)->where('user_id',$user->id)->get();

        if ($request->pay == 'yes') {

            //closing voting on chama
            $chama->openVote = 0;
            $chama->save();
            //sent notify chama members  user picked win ticket
            $users = $chama->users;
            foreach ($users as $key => $user) {

                Notification::send($user, new UserWon($chama, $user));
            }
            //check users if they have enough amount to pay



            foreach ($users as $key => $usr) {
                $wallet = Wallet::where('user_id', $usr->id)->first();
                $wallet->amount -=  intval($chama->amount);
                $getAmount += $chama->amount;
                $wallet->save();

                if ($usr->wallet->amount < $chama->amount) {
                    //Notify user sysm paid for  im
                    $wepaid =  $chama->amount -  $usr->wallet->amount;
                    Notification::send($user, new PayUsNotification($usr, $chama, $wepaid));
                }
            }


            //if one => user(s) doesnt have enough amount on wallet notify im to recharge wallet
            //else  deduct amount on users wallet and top it to user account
            //mark user as received money on given attribute and pay == false
            $user = User::find($request->user_id);
            $wallet = Wallet::where('user_id',  $user->id)->first();
            $wallet->amount += $getAmount;

            if ($wallet->save()) {
                Ticket::where('chama_id', $chama->id)
                    ->where('user_id', $user->id)
                    ->update(['pay' => 1, 'given' => 1, 'as_vote' => 1]);
            }

            //PayUser::dispatch($user);
        } else {
            Ticket::where('chama_id', $chama->id)
                ->where('user_id', $user->id)
                ->update(['pay' => 0, 'as_vote' => 1]);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'You voted successfully '
            ]
        );
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
