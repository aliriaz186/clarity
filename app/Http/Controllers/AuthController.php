<?php

namespace App\Http\Controllers;

use App\Admin;
use App\OutletTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //Displaying Auth Page
    public function loginForm(Request $request)
    {
        if (Session::has('userId')) {
            return redirect('dashboard');
        } else {
            return view('auth/login')->with(['source' => $request->source]);
        }
    }

    //Login Authentication
    public function login(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            $dbUser = User::where('email', $request->email)->first();
            if ($dbUser->password == md5($request->password)) {
                if ($dbUser->status != 0) {
                    if (OutletTable::where('user_id',$dbUser->id)->exists()){
                        Session::put('userId', $dbUser->id);
                        Session::put('isAdmin', true);
                        return json_encode(['status' => true, 'message' => 'Login Successfull!','journalist'=>true,'name'=>$dbUser->name]);
                    }
                    Session::put('userId', $dbUser->id);
                    return json_encode(['status' => true, 'message' => 'Login Successfull!','name'=>$dbUser->name]);
                } else {
                    return json_encode(['status' => false, 'message' => 'Your account is not approved yet!']);
                }
            } else {
                return json_encode(['status' => false, 'message' => 'Invalid username or password!']);
            }

        } else {
            return json_encode(['status' => false, 'message' => 'Invalid username or password!']);
        }
    }

    public function signout(Request $request)
    {
        Session::flush();
        return json_encode(true);
    }

    public function showSignUpForm()
    {
        return view('auth/signup');
    }

    public function showJournalistSignUpForm()
    {
        return view('auth/journalist-signup');
    }

    public function register(Request $request)
    {
        if (!User::where('email', $request->email)->exists()) {
            $user = new User();
            $user->name = $request->userName;
            $user->email = $request->email;
            $user->status = 1;
            $user->password = md5($request->password);
            $user->save();
            Session::put('userId', $user->id);
            return json_encode(['status' => true, 'message' => 'User registered!']);
        } else {
            return json_encode(['status' => false, 'message' => 'Email already exists!']);
        }
    }

    public function registerJournalist(Request $request)
    {
        if (!User::where('email', $request->email)->exists()) {
            $user = new User();
            $user->name = $request->userName;
            $user->email = $request->email;
            $user->status = 0;
            $user->password = md5($request->password);
            $user->save();
            $outletTable = new OutletTable();
            $outletTable->user_id = $user->id;
            $outletTable->name = $request->outlet;
            $outletTable->save();
            return json_encode(['status' => true, 'message' => 'User registered!']);
        } else {
            return json_encode(['status' => false, 'message' => 'Email already exists!']);
        }
    }

}
