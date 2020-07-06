<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Http\Request;


class Testmo extends Controller
{
    public function index(){
        $testimonies = Testimony::orderBy('id','Desc')->paginate(9);
        return view('client.testimonial')->with('testimonies',$testimonies);
    }
}
