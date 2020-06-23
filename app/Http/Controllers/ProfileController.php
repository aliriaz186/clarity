<?php

namespace App\Http\Controllers;

use App\ProfileTable;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfilePage()
    {
        return view('dashboard/dashboard');
    }

    public function viewBasicInfoPage()
    {
        $basicInfo['userId'] = '1';
        $basicInfo['yourName'] = 'Muhammad Talha';
        $basicInfo['username'] = 'muhammadtalha';
        $basicInfo['email'] = 'talhaphanna@gmail.com';
        return view('dashboard/basic-info')->with(['basicInfo' => $basicInfo]);
    }

    public function saveBasicInfo(Request $request)
    {
        try {
            if (!ProfileTable::where('user_id', $request->userId)->exists()) {
                $profileTable = new ProfileTable();
                $profileTable->user_id = $request->userId;
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
                $profileTable = ProfileTable::where('user_id', $request->userId)->first();
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
