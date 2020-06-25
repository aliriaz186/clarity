<?php

namespace App\Http\Controllers;

use App\Customer;
use App\ExpertiseAreaTable;
use App\Job;
use App\ProfileTable;
use App\Technician;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $profileTable=ProfileTable::where('user_id',Session::get('userId'))->first();
        $user = User::where('id', Session::get('userId'))->first();
        return view('dashboard/dashboard')->with(["profileTable"=>$profileTable]);
    }

    public function expertiInfo()
    {
        if (!ProfileTable::where('user_id', Session::get('userId'))->exists()) {
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
            $basicInfo['username'] = $user->name;
            $basicInfo['email'] = $user->email;
            $basicInfo['yourName'] = '';
            $basicInfo['shortBio'] = '';
            $basicInfo['miniResume'] = '';
            $basicInfo['cellPhone'] = '';
            $basicInfo['yourLocation'] = '';
            $basicInfo['yourTimezone'] = '';
        } else {
            $profileTable = ProfileTable::where('user_id', Session::get('userId'))->first();
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
            $basicInfo['yourName'] = $profileTable->your_name;
            $basicInfo['username'] = $profileTable->user_name;
            $basicInfo['shortBio'] = $profileTable->short_bio;
            $basicInfo['miniResume'] = $profileTable->mini_resume;
            $basicInfo['email'] = $profileTable->email;
            $basicInfo['cellPhone'] = $profileTable->cell_phone;
            $basicInfo['yourLocation'] = $profileTable->your_location;
            $basicInfo['yourTimezone'] = $profileTable->your_timezone;
        }
        return view('dashboard/expert-info')->with(['basicInfo' => $basicInfo]);
    }

    public function nextExpertInfo()
    {
        if (!ProfileTable::where('user_id', Session::get('userId'))->exists()) {
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
            $basicInfo['username'] = $user->name;
            $basicInfo['email'] = $user->email;
            $basicInfo['yourName'] = '';
            $basicInfo['shortBio'] = '';
            $basicInfo['miniResume'] = '';
            $basicInfo['cellPhone'] = '';
            $basicInfo['yourLocation'] = '';
            $basicInfo['yourTimezone'] = '';
            $basicInfo['hourlyRate'] = '';
        } else {
            $profileTable = ProfileTable::where('user_id', Session::get('userId'))->first();
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
            $basicInfo['yourName'] = $profileTable->your_name;
            $basicInfo['username'] = $profileTable->user_name;
            $basicInfo['shortBio'] = $profileTable->short_bio;
            $basicInfo['miniResume'] = $profileTable->mini_resume;
            $basicInfo['email'] = $profileTable->email;
            $basicInfo['cellPhone'] = $profileTable->cell_phone;
            $basicInfo['yourLocation'] = $profileTable->your_location;
            $basicInfo['yourTimezone'] = $profileTable->your_timezone;
            $basicInfo['hourlyRate'] = $profileTable->hourly_rate;
        }
        return view('dashboard/next-info')->with(['basicInfo' => $basicInfo]);
    }

    public function expertiseListing()
    {
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
        return view('dashboard/expertise-listing')->with(['basicInfo' => $basicInfo]);
    }

    public function expertiseListingView()
    {
        $expertListing=ExpertiseAreaTable::where('id_user',Session::get('userId'))->first();
        $user = User::where('id', Session::get('userId'))->first();
        $basicInfo['userId'] = $user->id;
        return view('dashboard/expert-listing-view')->with(['basicInfo' => $basicInfo,'expertListing'=>$expertListing]);
    }
    public function editExpertise(int $id){
        $user = User::where('id', Session::get('userId'))->first();
        $basicInfo['userId'] = $user->id;
        $expertListing=ExpertiseAreaTable::where('id',$id)->first();
        return view('dashboard/edit-expertise')->with(['expertListing'=>$expertListing,'basicInfo' => $basicInfo]);
    }
}
