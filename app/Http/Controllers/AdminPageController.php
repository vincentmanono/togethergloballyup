<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard') ;
    }
    public function groups(){
        return view('admin.groups') ;
    }
    public function groupsAdmins(){
        return view('admin.groupsAdmin') ;
    }
    public function mpesaAll(){
        return view('admin.mpesa.alltransactions') ;
    }
    public function testimonies(){
        return view('admin/testimony.testimonies') ;
    }

}
