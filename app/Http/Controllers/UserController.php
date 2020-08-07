<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\Subscription;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\payment\MpesaGateway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
// use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AccountCreatedNotification;

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
        if (Auth::user()->role == "super") {
            $users = User::where('role', 'user')->get();
            return view('admin.users.index')->with('users', $users)->with('user_type', 'User')->with('param', 'All');
        }

        $user = User::where('email', Auth::user()->email)->first();
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.users.create');
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => "required|numeric"
        ]);
        $data = $request->all();
        $check_email = User::where('email', $request->email)->count();
        if ($check_email > 0) {
            Session::flash('error', 'The email is already registered with us!');
            return redirect()->back();
        }
        $name =  $data['name'] . now();
        $slug =  Str::slug($name);
        $check = User::withTrashed()->where('slug', $slug)->count();
        $user = User::create([
            'name' => $data['name'],
            'slug' => Str::slug($name),
            'phone' => $data['phone'],
            'role' => 'user', //user , admin, super
            'email' => $data['email'],
            'password' => Hash::make("@togetherbloballyup"),
        ]);



        $user->slug = Str::slug($name);
        $user->save();

        Notification::send($user, new AccountCreatedNotification($user));



        return redirect()->route('admin.users.index')->with('success', 'You successfully added the user.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {

        if (Auth::user()->role !== "super" && $email != Auth::user()->email) {
            $user = User::where('email', Auth::user()->email)->first();
            return redirect()->route('profile.index');
        }

        $user = User::where('email', $email)->first();
        return view('users.profile', compact('user'));
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

        if (!$request->hasFile('avatar') && $request->has('avatar')) {
            return redirect()->back()->with('error', 'Image not supported');
        }
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);


        $user = User::find($id);
        $data = $request->all();
        if (auth()->user()->role == "super") {
            if ($request->input('role') == "on") {
                # code...
                $user->role = 'super';
            }
        } else {

            if ($user->password != null) {
                $this->validate($request, [
                    'old_password' => 'required',
                ]);

                if (!(Hash::check($request->old_password, $user->password))) {
                    return redirect()->back()->with('error', 'Old password is wrong.');
                }
            }
        }




        $user->name = $request->input('name');



        if (User::where('phone', $request->phone)->where('phone', '!=', $user->phone)->count() > 0) {
            return redirect()->back()->with('error', 'Sorry The phone record already exists');
        } else {
            $user->phone = $request->input('phone');
        }

        if (User::where('email', $request->email)->where('email', '!=', $user->email)->count() > 0) {
            return redirect()->back()->with('error', 'Sorry The email record already exists');
        } else {
            $user->email = $request->input('email');
        }



        if ($request->password != '') {
            if ($request->password == $request->password_confirmation) {
                $user->password = bcrypt($request->password);
            } else {
                Session::flash('error', 'Confirmation password and the password do not match.');
                return redirect()->back();
            }
        }



        if (file_exists($request->file('avatar'))) {



            $old_avatar = $user->avatar;
            $avatar = $request->avatar;
            if ($old_avatar != 'avatar.png' && !Str::contains(auth()->user()->avatar, 'http')) {
                $imagepath = public_path('/storage/users/') . '/' . $old_avatar;
                File::delete($imagepath);
            }



            // Get filename with extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('avatar')->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            // Uplaod image
            $path = $request->file('avatar')->storeAs('public/users', $filenameToStore);

            // Upload image
            $user->avatar = $filenameToStore;
        }

        if ($user->role != 'user') {
            if ($request->role == 'on') {
                $type = 'super';
            } else {
                $type = 'admin';
            }
            if (Auth::user()->role == 'super') {

                if ($request->super != 'on' && User::where('role', 'super')->count() == 1 && $user->role == 'super') {
                    Session::flash('error', 'Sorry, you are the ONLY REMAINING super admin!');
                    return redirect()->back();
                }

                $user->role = $type;
            } else if ($user->role != $type) {
                Session::flash('error', 'You cannot change your super-admin status since you are not a super admin!');
                return redirect()->back();
            }
        }

        $result = $user->save();

        // Require verification of new email and send EmailVerificationNotification.
        if ($user->email != $request->email) {
            $user->email_verified_at = null;
            $result = $user->save();
            $user->sendEmailVerificationNotification();
        }

        if ($result) {
            Session::flash('success', 'You successifully updated the users profile.');
            if (Auth::user()->role == 'user')
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
        try {
            $user = User::where('slug', $slug)->first();
        } catch (QueryException $ex) {
            Session::flash('error', 'Admin/User could not be found!');
            return redirect()->back();
        }

        if (Auth::user()->role == 'super' || Auth::user()->slug == $slug) {
            if (User::where('role', 'super')->count() == 1 && Auth::user()->role == 'super' && Auth::user()->slug == $user->slug) {
                Session::flash('error', 'Sorry, you are the ONLY REMAINING super admin! Make someone else a super admin then exit.');
                return redirect()->back();
            }
            $old_avatar = $user->avatar;
            if ($old_avatar != 'avatar.png' && !Str::contains(auth()->user()->avatar, 'http')) {
                $imagepath = public_path('/storage/users/') . '/' . $old_avatar;
                File::delete($imagepath);
            }

            $user->forceDelete();
            Session::flash('success', 'Admin/User removed successfully');

            return redirect()->route('home');
        }
        Session::flash('error', 'Admin/User could not be removed! Task only allowed to Super Admin!');
        return redirect()->back();
    }
}
