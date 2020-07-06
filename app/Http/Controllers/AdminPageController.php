<?php

namespace App\Http\Controllers;

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
    public function mpesaAll(){
        return view('admin.mpesa.alltransactions') ;
    }
    public function testimonies(){
        return view('admin/testimony.testimonies') ;
    }

}
