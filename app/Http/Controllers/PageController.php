<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Testimony;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index(){

        return view('client.index');

    }
    public function about(){
        return view('client.about');
    }
    public function services(){
        return view('client.services');
    }

    public function contact(){
        return view('client.contact');
    }
    public function send(Request $request)
    {

        $data = $request->all() ;

        $users = User::where('role',"super")->get();
        // return (new ContactMail($data) )->render() ;

        foreach ($users as $user) {
            Mail::to($user)
            ->send(new ContactMail($data));

        }
            return back()->with("success","Contact send successfully") ;


    }
    public function blog(){
        return view('client.blog');
    }
    public function faq(){
        return view('client.faq');
    }
    public function testimonial(){

        $testimonies = Testimony::orderBy('id','Desc')->paginate(9);
        return view('client.testimonial')->with('testimonies',$testimonies);
    }
    
}
