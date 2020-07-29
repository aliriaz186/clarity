<?php

namespace App\Http\Controllers;

use App\Admin;
use App\OutletTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminContoller extends Controller
{
    public function getLoginView()
    {
        return view('admin/login');
    }

    public function login(Request $request)
    {
        if (Admin::where('email', $request->email)->exists()) {
            $dbUser = Admin::where('email', $request->email)->first();
            if ($dbUser->password == md5($request->password)) {
                Session::put('id', $dbUser->id);
                Session::put('isAdmin', true);
                return json_encode(['status' => true, 'message' => 'Login Successfull!']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Invalid username or password!']);
        }
    }

    public function dashboard()
    {
        $allUsers = User::all();
        $journalistRequests = User::where('status', 0)->get();
        return view('admin.dashboard')->with(['allUsers' => $allUsers, 'journalistRequest' => $journalistRequests]);
    }

    public function journalRequests()
    {
        $journalistRequests = User::all();
        $journalistsData = [];
        for ($i = 0; $i < count($journalistRequests); $i++) {
            if (OutletTable::where('user_id', $journalistRequests[$i]['id'])->exists()) {
                array_push($journalistsData, $journalistRequests[$i]);
            }
        }
        return view('admin/journalist-requests')->with(['journalistRequests' => $journalistsData]);
    }

    public function approveRequest(Request $request)
    {
        $users = User::where('id', $request->journalistId)->first();
        $users->status = 1;
        $users->update();
        return json_encode(['status' => true, 'message' => 'Request Approved Successfull!']);
    }

}
