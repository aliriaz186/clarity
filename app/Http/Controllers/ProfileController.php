<?php

namespace App\Http\Controllers;

use App\ExpertiseAreaTable;
use App\OutletTable;
use App\ProfileTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function viewProfilePhotoPage()
    {
        if (ProfileTable::where('user_id', Session::get('userId'))->exists()) {
            $profilePhoto = ProfileTable::where('user_id', Session::get('userId'))->first()['profile_photo'];
        } else {
            $profilePhoto = '';
        }
        return view('dashboard/profile-photo')->with(['profilePhoto' => $profilePhoto]);
    }

    public function updateProfilePhoto(Request $request)
    {
        try {
            if (ProfileTable::where(['user_id' => Session::get('userId')])->exists()) {
                $profileTable = ProfileTable::where(['user_id' => Session::get('userId')])->first();
                if ($request->hasfile('files')) {
                    $file = $request->file('files')[0];
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/profile-pictures/', $name);
                    if (!empty($profileTable->profile_photo)) {
                        if (File::exists(public_path() . '/profile-pictures/' . $profileTable->profile_photo)) {
                            File::delete(public_path() . '/profile-pictures/' . $profileTable->profile_photo);
                        }
                    }
                    $profileTable->profile_photo = $name;
                }
                $profileTable->update();
                return json_encode(['status' => true]);
            } else {
                $profileTable = new ProfileTable();
                $profileTable->user_id = Session::get('userId');
                $user = User::where('id', Session::get('userId'))->first();
                $profileTable->user_name = $user->name;
                $profileTable->email = $user->email;
                if ($request->hasfile('files')) {
                    $file = $request->file('files')[0];
                    $name = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/profile-pictures/', $name);
                    if (!empty($profileTable->profile_photo)) {
                        if (File::exists(public_path() . '/profile-pictures/' . $profileTable->profile_photo)) {
                            File::delete(public_path() . '/profile-pictures/' . $profileTable->profile_photo);
                        }
                    }
                    $profileTable->profile_photo = $name;
                }
                $profileTable->save();
                return json_encode(['status' => true]);
            }

        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => 'Failed to save data. There is error on server side!', 'error' => $exception->getMessage()]);
        }
    }

    public function viewOutletPage()
    {
        if (OutletTable::where('user_id', Session::get('userId'))->exists()) {
            $outletList = OutletTable::where('user_id', Session::get('userId'))->get();
        } else {
            $outletList = [];
        }
        return view('dashboard/outlet')->with(['outletList' => $outletList]);
    }

    public function saveOutletInfo(Request $request)
    {
        try {
            if (!OutletTable::where(['user_id' => Session::get('userId'), 'name' => $request->outlet])->exists()) {
                $outletTable = new OutletTable();
                $outletTable->user_id = Session::get('userId');
                $outletTable->name = $request->outlet;
                return json_encode(['status' => $outletTable->save()]);
            } else {
                return json_encode(['status' => false, 'message' => 'Outlet Already Exists']);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function deleteOutlet(Request $request)
    {
        try {
            if (OutletTable::where('id', $request->outletId)->exists()) {
                $outletTable = OutletTable::where('id', $request->outletId)->first();
                return json_encode(['status' => $outletTable->delete()]);
            } else {
                return json_encode(['status' => false, 'message' => 'Outlet Doesnot Exists']);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function updateInfo(Request $request)
    {
        try {
            if (ProfileTable::where('user_id', $request->idUser)->exists()) {
                $profileTable = ProfileTable::where('user_id', $request->idUser)->first();
                $profileTable->user_name = $request->userName;
                $profileTable->email = $request->email;
                $profileTable->cell_phone = $request->cellPhone;
                $profileTable->your_timezone = $request->timeZone;
                return json_encode($profileTable->update());
            } else {
                $profileTable = new ProfileTable();
                $profileTable->user_name = $request->userName;
                $profileTable->user_id = $request->idUser;
                $profileTable->email = $request->email;
                $profileTable->cell_phone = $request->cellPhone;
                $profileTable->your_timezone = $request->timeZone;
                return json_encode($profileTable->save());
            }

        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function updateNextInfo(Request $request)
    {
        try {

            if (ProfileTable::where('user_id', $request->idUser)->exists()) {
                $profileTable = ProfileTable::where('user_id', $request->idUser)->first();
                $profileTable->short_bio = $request->shortBio;
                $profileTable->mini_resume = $request->resume;
                $profileTable->hourly_rate = $request->hourlyRate;
                return json_encode($profileTable->update());
            } else {
                $profileTable =ProfileTable::where('user_id',$request->idUser)->first();
                $profileTable->user_id = $request->idUser;
                $profileTable->short_bio = $request->shortBio;
                $profileTable->mini_resume = $request->resume;
                $profileTable->hourly_rate = $request->hourlyRate;
                return json_encode($profileTable->save());
            }

        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }
    public function expertiseSave(Request $request){

        try{
            $expetiseTable=new ExpertiseAreaTable();
            $fileName="";
            if($request->hasFile('cover_image')){
                $brand_logo= $request->file('cover_image');
                $fileName = time().'.'.$brand_logo->getClientOriginalExtension();
                $request->cover_image->move(public_path('img/cover'), $fileName);
                if(!File::exists(public_path('img/cover/'. $fileName))) {  // check file exists in directory or not
                    return json_encode("Image is not uploaded!", 401);
                }
                $input["image"] = $fileName;
            }
            $expetiseTable->cover_image=$fileName;
            $expetiseTable->title=$request->title;
            $expetiseTable->category=$request->category;
            $expetiseTable->description=$request->description;
            $expetiseTable->id_user=$request->userId;
            $expetiseTable->expertise_tags=$request->tags;
            return json_encode( $expetiseTable->save());
        }
        catch (\Exception $exception){
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

}
