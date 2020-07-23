<?php

namespace App\Http\Controllers;

use App\Chama;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminChamaController extends Controller
{
    public function allmychama()
    {

        $user = User::find(auth()->user()->id) ;
        $chamas =$user->allMyChama ;

        return view('admin/chama/AdminChama/index')->with('chamas',$chamas)  ;

    }

    public function show($id)
    {
        $chama = Chama::find($id) ;
        //   $this->authorize('view',$chama) ;
        return view('admin.chama.AdminChama.show',compact('chama')) ;

    }

    public function openvoting($id)
    {

        $chama = Chama::findOrFail($id);
        $this->authorize('update',$chama) ;
        $chama->openVote = true ;

        if($chama->save()){
            Session::flash('success',"Now members can start to vote successfully");

        }else{
            Session::flash('error',"Error occurred try again");
        }

         return back();
    }
}
