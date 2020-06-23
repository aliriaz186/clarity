<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfilePage()
    {
        return view('dashboard/dashboard');
    }

    public function viewBasicInfoPage()
    {
        return view('dashboard/basic-info');
    }
}
