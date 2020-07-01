<?php

namespace App\Http\Controllers;

use App\Admin;
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
                Session::put('userId', $dbUser->id);
                Session::put('isAdmin', true);
                return json_encode(['status' => true, 'message' => 'Login Successfull!']);
            } else {
                return json_encode(['status' => false, 'message' => 'Invalid username or password!']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Invalid username or password']);
        }
    }

    public function signout(Request $request){
        Session::flush();
        return json_encode(true);
    }

    public function showSignUpForm()
    {
        return view('auth/signup');
    }

    public function register(Request $request)
    {
        $user=new User();
        $user->name=$request->userName;
        $user->email=$request->email;
        $user->password=md5($request->password);
        $result = $user->save();
        Session::put('userId', $user->id);
        Session::put('isAdmin', true);
        return json_encode($result);
    }

}
