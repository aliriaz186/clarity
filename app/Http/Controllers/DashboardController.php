<?php

namespace App\Http\Controllers;

use App\CallRequestTable;
use App\Customer;
use App\ExpertiseAreaTable;
use App\ExpertiseReviewTable;
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
        $profileTable = ProfileTable::where('user_id', Session::get('userId'))->first();
        $user = User::where('id', Session::get('userId'))->first();
        return view('dashboard/dashboard')->with(["profileTable" => $profileTable]);
    }

    public function viewLandingPageDashboard()
    {
        $expertiseReviewTable = ExpertiseReviewTable::where('status', 'approved')->get();
        foreach ($expertiseReviewTable as $item) {
            $item['expert'] = ExpertiseAreaTable::where('id', $item->id_expertise)->first();
            $item['profile'] = ProfileTable::where('user_id', $item->id_user)->first();
        }
        return view('landing-page/dashboard')->with(["experts" => $expertiseReviewTable]);
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
        if (ExpertiseAreaTable::where('id_user', Session::get('userId'))->exists()) {
            $status = true;
            $expertListing = ExpertiseAreaTable::where('id_user', Session::get('userId'))->first();
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
            if (ExpertiseReviewTable::where('id_user', Session::get('userId'))->exists()) {
                $clarityUsing = false;
                return view('dashboard/expert-listing-view')->with(['basicInfo' => $basicInfo, 'expertListing' => $expertListing, 'status' => $status, 'clarityUsing' => $clarityUsing]);
            } else {
                $clarityUsing = true;
                return view('dashboard/expert-listing-view')->with(['basicInfo' => $basicInfo, 'expertListing' => $expertListing, 'status' => $status, 'clarityUsing' => $clarityUsing]);
            }
        } else {
            $status = false;
            $profileTable = ProfileTable::where('user_id', Session::get('userId'))->first();
            $expertListing = ExpertiseAreaTable::where('id_user', Session::get('userId'))->first();
            $user = User::where('id', Session::get('userId'))->first();
            $basicInfo['userId'] = $user->id;
            if (ExpertiseReviewTable::where('id_user', Session::get('userId'))->exists()) {
                $clarityUsing = false;
                return view('dashboard/expert-listing-view')->with(['basicInfo' => $basicInfo, 'expertListing' => $expertListing, 'status' => $status, 'clarityUsing' => $clarityUsing]);
            } else {
                $clarityUsing = true;
                return view('dashboard/expert-listing-view')->with(['basicInfo' => $basicInfo, 'expertListing' => $expertListing, 'status' => $status, 'clarityUsing' => $clarityUsing, 'profileTable' => $profileTable]);
            }
        }
    }

    public function editExpertise(int $id)
    {
        $user = User::where('id', Session::get('userId'))->first();
        $basicInfo['userId'] = $user->id;
        $expertListing = ExpertiseAreaTable::where('id', $id)->first();
        return view('dashboard/edit-expertise')->with(['expertListing' => $expertListing, 'basicInfo' => $basicInfo]);
    }

    public function clarityUsing(int $id)
    {
        $expertiseReview = new ExpertiseReviewTable();
        $expertiseReview->id_expertise = $id;
        $expertiseReview->id_user = Session::get('userId');
        $expertiseReview->status = 'pending';
        $expertiseReview->save();
        return redirect()->back()->withErrors("Your Request has been recieved our team will contact you in 24 hours");
    }

    public function showCallRequests()
    {
        $callRequests = CallRequestTable::where('id_journalist', Session::get('userId'))->get();
        return view('dashboard/call-requests')->with(['callRequests' => $callRequests]);
    }

    public function showCallHistory()
    {
        $userEmail = User::where('id', Session::get('userId'))->first()['email'];
        $callRequests = CallRequestTable::where('caller_email', $userEmail)->get();
        for ($i = 0; $i < count($callRequests); $i++) {
            $callRequests[$i]['journalistName'] = User::where('id', $callRequests[$i]['id_journalist'])->first()['name'];
            $callRequests[$i]['journalistPhoneNumber'] = ProfileTable::where('user_id', $callRequests[$i]['id_journalist'])->first()['cell_phone'];
        }
        return view('dashboard/user-calls-history')->with(['callRequests' => $callRequests]);
    }
}
