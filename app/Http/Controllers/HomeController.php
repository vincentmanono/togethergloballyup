<?php

namespace App\Http\Controllers;

use App\User;
use App\Chama;
use App\Subscription;
use App\Withdraw;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ( auth()->user()->role == 'super') {
            $admins = User::where('role','admin')->count();
            $super = User::where('role','super')->count();
            $users = User::where('role','user')->count();
            $active_subscribers = User::where('subscription_expiry', '>=', now()->format('Y-m-d H:i:s'))->count();
            $active_chamas = Chama::where('activate',true)->count() ;
            $withdraws = Withdraw::latest()->paginate(20);

            return view('admin.dashboard',compact('admins','users','active_subscribers','active_chamas','super','withdraws'));
        } else {
            $subscriptions = Subscription::where('user_id',auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(5);
            return view('home',compact('subscriptions'));
        }


    }
}
