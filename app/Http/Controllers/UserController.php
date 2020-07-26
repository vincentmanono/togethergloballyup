<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\User;
use App\Subscription;

use Illuminate\Http\Request;
use App\payment\MpesaGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
         $user = User::where('email',$email)->first() ;
        return view('users.profile',compact('user')) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(!$request->hasFile('avatar') && $request->has('avatar')){
            return redirect()->back()->with('error','Image not supported');
        }
        $this->validate($request, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' =>'required|numeric'
        ]);


        $user = User::find($id) ;
        $data = $request->all();
        if ( auth()->user()->role == "super"  ) {
            if ( $request->input('role') == "on") {
                # code...
                $user->role = 'super' ;
            }


        }else{
             $this->validate($request, [
                'old_password' => 'required',
            ]);

            if( ! (Hash::check($request->old_password, $user->password))){
                return redirect()->back()->with('error', 'Old password is wrong.');
            }

        }




            $user->firstName = $request->input('firstname') ;
            $user->lastName = $request->input('lastname') ;



            if(User::where('phone', $request->phone)->where('phone','!=',$user->phone)->count() > 0){
                return redirect()->back()->with('error','Sorry The phone record already exists');
            }else{
                 $user->phone = $request->input('phone') ;
            }

            if(User::where('email', $request->email)->where('email','!=',$user->email)->count() > 0){
                return redirect()->back()->with('error','Sorry The email record already exists');
            }  else{
                 $user->email = $request->input('email') ;
            }



            if($request->password != ''){
                if($request->password == $request->password_confirmation){
                    $user->password = bcrypt($request->password);
                }
                else{
                    Session::flash('error', 'Confirmation password and the password do not match.');
                    return redirect()->back();
                }
            }



            if ( file_exists($request->file('avatar')) ) {

                $old_avatar = $user->avatar;
                $avatar = $request->avatar;
                if($old_avatar != 'avatar.png'){
                    Storage::delete('public/users'.'/'.$user->image);
                }



                // Get filename with extension
                        $filenameWithExt = $request->file('avatar')->getClientOriginalName();

                        // Get just the filename
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                        // Get extension
                        $extension = $request->file('avatar')->getClientOriginalExtension();

                        // Create new filename
                        $filenameToStore = $filename.'_'.time().'.'.$extension;

                        // Uplaod image
                        $path= $request->file('avatar')->storeAs('public/users', $filenameToStore);

                        // Upload image
                        $user->avatar = $filenameToStore ;
            }

            if($user->role != 'user'){
                if($request->role == 'on'){
                    $type = 'super';
                }
                else{
                    $type = 'admin';
                }
                if(Auth::user()->role == 'super'){

                    if($request->super != 'on' && User::where('role', 'super')->count() == 1 && $user->role == 'super'){
                        Session::flash('error', 'Sorry, you are the ONLY REMAINING super admin!');
                        return redirect()->back();
                    }

                    $user->role = $type;

                }
                else if($user->role != $type){
                    Session::flash('error', 'You cannot change your super-admin status since you are not a super admin!');
                    return redirect()->back();
                }
            }

            $result = $user->save();

            // Require verification of new email and send EmailVerificationNotification.
            if($user->email != $request->email){
                $user->email_verified_at = null;
                $result = $user->save();
                $user->sendEmailVerificationNotification();
            }

            if($result){
                Session::flash('success', 'You successifully updated the users profile.');
                if(Auth::user()->role == 'user')
                    return redirect()->back()->with('success', 'You successifully updated the users profile.');
                return redirect()->back();
            }

            Session::flash('error', 'You could not update the users profile.');
            return redirect()->back();






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        try{
            $user = User::where('slug', $slug)->first();
        }
        catch(QueryException $ex){
            Session::flash('error', 'Admin/User could not be found!');
            return redirect()->back();
        }

        if(Auth::user()->type == 'super' || Auth::user()->slug == $slug ||  (Auth::user()->is_admin && !$user->is_admin)){
            if(User::where('type', 'super')->where('view', true)->count() == 1 && Auth::user()->type == 'super' && Auth::user()->slug == $user->slug){
                Session::flash('error', 'Sorry, you are the ONLY REMAINING super admin! Make someone else a super admin then exit.');
                return redirect()->back();
            }
            $avatar = $user->avatar;
            // if($avatar != 'uploads/users/avatar.png'){
            //     File::delete($avatar);
            // }
            $type = $user->type;
            $user->forceDelete();
            Session::flash('success', 'Admin/User removed successfully');
            if($type == 'user')
                return redirect()->route('users.index');
            return redirect()->route('admin_index');
        }
        Session::flash('error', 'Admin/User could not be removed! Task only allowed to Super Admin!');
        return redirect()->back();
    }
}
