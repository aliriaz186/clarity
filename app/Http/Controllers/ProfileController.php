<?php

namespace App\Http\Controllers;

use App\ProfileTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function viewProfilePage()
    {
        return view('dashboard/dashboard');
    }

    public function viewBasicInfoPage()
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
            $basicInfo['yourName'] = $profileTable->your_name;
            $basicInfo['username'] = $profileTable->user_name;
            $basicInfo['shortBio'] = $profileTable->short_bio;
            $basicInfo['miniResume'] = $profileTable->mini_resume;
            $basicInfo['email'] = $profileTable->email;
            $basicInfo['cellPhone'] = $profileTable->cell_phone;
            $basicInfo['yourLocation'] = $profileTable->your_location;
            $basicInfo['yourTimezone'] = $profileTable->your_timezone;
        }
        return view('dashboard/basic-info')->with(['basicInfo' => $basicInfo]);
    }

    public function saveBasicInfo(Request $request)
    {
        try {
            if (!ProfileTable::where('user_id', Session::get('userId'))->exists()) {
                $profileTable = new ProfileTable();
                $profileTable->user_id = Session::get('userId');
                $profileTable->your_name = $request->yourName;
                $profileTable->user_name = $request->username;
                $profileTable->short_bio = $request->shortBio;
                $profileTable->mini_resume = $request->miniResume;
                $profileTable->email = $request->email;
                $profileTable->cell_phone = $request->phone;
                $profileTable->your_location = $request->location;
                $profileTable->your_timezone = $request->timeZone;
                return json_encode(['status' => $profileTable->save()]);
            } else {
                $profileTable = ProfileTable::where('user_id', Session::get('userId'))->first();
                $profileTable->your_name = $request->yourName;
                $profileTable->user_name = $request->username;
                $profileTable->short_bio = $request->shortBio;
                $profileTable->mini_resume = $request->miniResume;
                $profileTable->email = $request->email;
                $profileTable->cell_phone = $request->phone;
                $profileTable->your_location = $request->location;
                $profileTable->your_timezone = $request->timeZone;
                return json_encode(['status' => $profileTable->update()]);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }
}
