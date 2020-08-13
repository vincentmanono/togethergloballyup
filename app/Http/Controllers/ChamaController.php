<?php

namespace App\Http\Controllers;

use App\User;
use App\Chama;
use App\Ticket;
use App\Wallet;
use App\Payment;
use App\ChamaUser;
use Illuminate\Http\Request;
use App\payment\MpesaGateway;
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



    public function chamaJoin(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $chama = Chama::find($request->input('chamaID'));
        $asthischama = ChamaUser::where('user_id', $user->id)->where('chama_id', $chama->id)->count();
        if ($asthischama) {
            $request->session()->flash('error', "You are member in this chama");
            return back();
        }
        if (auth()->user()->subscription_expiry < now() && auth()->user()->role != "super") {
            Session::flash('error', "Please renew your subscription !!!");
            return back();
        }
        $members = ChamaUser::where('chama_id', $chama->id)->count();
        if ($members >= 20) {
            $request->session()->flash('error', "This Chama as already maximum number of members !!");
            return back();
        }
        $user->chamaSubscribed()->attach([$chama->id]);
        $user->tickets()->create([
            'chama_id' => $chama->id,
            'given' => false,
            'as_vote' => false

        ]);
        $request->session()->flash('success', "You have successfully subscribed to " . $chama->name);

        return back();
    }
    public function exitChama(Request $request)
    {
        $user = User::find( auth()->user()->id);
        $chama = Chama::find($request->input('chamaID'));
        if ( $user->id == $chama->user_id ) {
            $request->session()->flash('error', "You are  only Administrator  on " . $chama->name . " chama");

            return back();

        }
        $user->chamaSubscribed()->detach([$chama->id]);
        $request->session()->flash('success', "You have successfully exit from  " . $chama->name . " chama");

        return back();
    }


    public function subscribedChama()
    {

        $chamas = auth()->user()->chamaSubscribed;

        return view('admin.chama.subscribed')->with('chamas', $chamas);
    }

    public function singleSubscribedChama(Chama $chama)
    {
        $user = auth()->user();
        $chama = Chama::findOrFail($chama->id);
        $wallet = Auth::user()->wallet;
        $shouldvote = Ticket::where('chama_id', $chama->id)->where('user_id', $user->id)->first();
        $tickets = Ticket::where('chama_id', $chama->id)->get();
        // return $shouldvote->given ;
        return view('admin.subscriptions.SingleChama', compact('chama', 'wallet', 'shouldvote', 'tickets'));
    }



    public function takevote($chama_id)
    {
        $chama = Chama::where('id', $chama_id)->where('openVote', true)->first();
        $user = auth()->user();

        if ($user->wallet->amount < $chama->amount) {
            $top = intval($chama->amount)  - intval($user->wallet->amount);
            Session::flash('error', "Please top Up your wallet  with KSH " . $top  . " to be able to vote ");
            return back();
        }
        if (auth()->user()->subscription_expiry < now() && auth()->user()->role != "super") {
            Session::flash('error', "Please renew your subscription first do be able to vote ");
            return back();
        }

        if ($chama->count() < 1) {
            Session::flash('error', "Please contact chama admin for more information ");
            return redirect()->route('user.chama.subscribed.single', $chama_id);
        }

        // return $chama->id ;


        $shouldvote = Ticket::where('chama_id', $chama->id)->where('user_id', $user->id)->first();
        // return $shouldvote->given ;
        if ($shouldvote->given  == 1) {
            Session::flash('error', "you can't vote until all members  win like you");
            return redirect()->route('user.chama.subscribed.single', $chama->id);
        } else if ($shouldvote->as_vote == 1) {

            Session::flash('error', "you have already voted . Wait for next round");
            return redirect()->route('user.chama.subscribed.single', $chama->id);
        } else {
            return view('admin.chama.tikects.vote', compact('chama'));
        }
    }

    public function activateChama(Request $request, $chama_id, MpesaGateway $mpesaGateway)
    {


        request()->validate(array( //|regex:/(^(\d+){1,10})/u
            'phone' => 'required|numeric',
        ));
        $amount = 150;
        $phone = $request->phone;

        try {

            $response =   $mpesaGateway->activate_chama($phone, $amount);
            $chama = Chama::find($chama_id);
            $chama->payments()->create([
                'user_id' => Auth::user()->id,
                'merchantRequestID' => $response['MerchantRequestID'],
                'checkoutRequestID' => $response['CheckoutRequestID'],
                'responseCode' => $response['ResponseCode'],
                'responseDescription' => $response['ResponseDescription'],
                'customerMessage' => $response['CustomerMessage'],
                'phoneNumber' => $phone,
                'amount' => $amount,
            ]);
            return back()->with('success',  $response['CustomerMessage']);
        } catch (\Throwable $th) {
            return  back()->with('error', $response['errorMessage']);
        }
    }


    public function handle_result(Request $request)
    {
        $data = $request->all();
        $data = $data['Body']['stkCallback'];
        $result = Payment::where('checkoutRequestID', $data['CheckoutRequestID'])->where('active', true)->first();
        $result->active = false;
        $result->result = json_encode($data);
        $result->save();

        if ($result == null || $result->merchantRequestID != $data['MerchantRequestID'])
            return null;
        $result->resultCode = $data['ResultCode'];
        $result->resultDesc = $data['ResultDesc'];
        $result->save();
        if ($result->resultCode == 0) {
            $items = $data['CallbackMetadata']['Item'];
            foreach ($items as $item) {
                if ($item['Name'] == 'Amount' && array_key_exists('Value', $item))
                    $result->amount = $item['Value'];
                elseif ($item['Name'] == 'MpesaReceiptNumber' && array_key_exists('Value', $item))
                    $result->mpesaReceiptNumber = $item['Value'];
                elseif ($item['Name'] == 'Balance' && array_key_exists('Value', $item))
                    $result->balance = $item['Value'];
                elseif ($item['Name'] == 'TransactionDate' && array_key_exists('Value', $item))
                    $result->transactionDate = date('Y-m-d H:i:s', strtotime($item['Value']));
            }

            $result->save();
            $chama = Chama::where('user_id', $result->user_id)->where('id', $result->paymentable_id)->first();
            $chama->activate = true;
            $chama->save();
        }
    }





    public function index()
    {
        $user = auth()->user()->role == "super";
        if ($user) {
            $chamas = Chama::all();
        } else {
            $chamas = Chama::where('activate', true)->get();
        }



        return view('admin.chama.chamas')->with('chamas', $chamas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->subscription_expiry < now() && auth()->user()->role != "super") {
            Session::flash('error', "Please renew your subscription !!!");
            return back();
        } else {
            return view('admin.chama.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChamaStoreRequest $request)
    {
        if (auth()->user()->subscription_expiry < now() && auth()->user()->role != "super") {
            Session::flash('error', "Please renew your subscription !!!");
            return back();
        }

        $user = User::find(auth()->user()->id);
        $chama = new Chama();
        $chama->name = $request->input('name');
        $chama->amount = $request->input('amount');
        $chama->description = $request->input('description');
        $chama->user_id = $user->id;
        if ($chama->save()) {
            if ($user->role != "super") {
                $user->role = 'admin';
                $user->save();
            }


            $user->chamaSubscribed()->attach([$chama->id]);
            $user->tickets()->create([
                'chama_id' => $chama->id,
                'given' => false,
                'as_vote' => false

            ]);

            $request->session()->flash('success', "Your chama created successfully");
            return redirect()->route('admin.chama.show', $chama->id);
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
        return view('admin.chama.show', compact('chama'));
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
        $this->authorize('update', $chama);
        $chama = Chama::findOrFail($chama->id);

        $this->validate($request, [
            'name' => 'required|string|max:150',
            'amount' => 'required|numeric',
            'description' => 'nullable|min:5'
        ]);

        if ($chama->user_id == auth()->user()->id || auth()->user()->role == 'super') { //
            $chama->name = $request->name;
            $chama->amount = $request->amount;
            $chama->description = $request->description;

            if ($chama->save()) {
                return back()->with('success', 'Chama details updated successfully');
            }
            return back()->with('error', 'Error occurred Please try again');
        } else {
            return back()->with('error', 'You cant updated other people chama');
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
        $this->authorize('delete', $chama);
        if ($chama->user_id == auth()->user()->id || auth()->user()->role == 'super') {
            if ($chama->delete()) {
                return redirect()->route('admin.allmychama')->with('success', 'Chama details deleted successfully');
            }
        } else {
            return back()->with('error', 'Error occurred');
        }
    }
}
