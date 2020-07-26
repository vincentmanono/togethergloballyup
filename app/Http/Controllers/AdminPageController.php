<?php

namespace App\Http\Controllers;

use App\User;
use App\Chama;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard') ;
    }
    public function chamaAdmins(){
        $chamas = Chama::all();
        return view('admin.chama.ChamaAdmin',compact('chamas')) ;
    }

    public function testimonies(){
        return view('admin/testimony.testimonies') ;
    }

    public function super(){
        $supers = User::where('role','super')->get();
        return view('admin.super.allSuper',compact('supers')) ;
    }

    public function supersingle($email)
    {
        $user = User::where('role','super')->where('email',$email)->first();
        return view('admin.super.super',compact('user')) ;

    }

}
