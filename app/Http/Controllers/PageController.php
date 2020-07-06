<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Http\Request;


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
