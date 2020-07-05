<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard') ;
    }
    public function chamaAdmins(){
        return view('admin.chama.ChamaAdmin') ;
    }
    public function mpesaAll(){
        return view('admin.mpesa.alltransactions') ;
    }
    public function testimonies(){
        return view('admin/testimony.testimonies') ;
    }

}
