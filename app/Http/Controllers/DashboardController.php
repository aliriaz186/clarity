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
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;

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
        $expertiseReview->status = 'approved';
        $expertiseReview->save();
        return redirect()->back()->withErrors("Your Request has been recieved our team will contact you in 24 hours");
    }

    public function showCallRequests()
    {
        if (ExpertiseAreaTable::where('id_user', Session::get('userId'))->exists()) {
            $id = ExpertiseAreaTable::where('id_user', Session::get('userId'))->first()['id'];
            $callRequests = CallRequestTable::where('id_journalist', $id)->get();
            return view('dashboard/call-requests')->with(['callRequests' => $callRequests]);
        } else {
            return view('dashboard/call-requests')->with(['callRequests' => []]);
        }
    }

    public function showCallHistory()
    {
        $userEmail = User::where('id', Session::get('userId'))->first()['email'];
        $callRequests = CallRequestTable::where('caller_email', $userEmail)->get();
        for ($i = 0; $i < count($callRequests); $i++) {
            $userId = ExpertiseAreaTable::where('id', $callRequests[$i]['id_journalist'])->first()['id_user'];
            $callRequests[$i]['journalistName'] = User::where('id', $userId)->first()['name'];
            $callRequests[$i]['journalistPhoneNumber'] = ProfileTable::where('user_id', $userId)->first()['cell_phone'];
        }
        return view('dashboard/user-calls-history')->with(['callRequests' => $callRequests]);
    }

    public function forgotPasswordRequest(Request $request)
    {
        $userEmail = $request->email;
        if (!User::where('email', $userEmail)->exists()) {
            return json_encode(['status' => false, 'message' => 'Email Not registered']);
        }
        $subject = new SendEmailService(new EmailSubject("Forgot Password Request. Click On link to change password"));
        $mailTo = new EmailAddress($userEmail);
        $emailBody = env('APP_URL') . "/set-password/" . $userEmail . "/get";
        $body = new EmailBody($emailBody);
        $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
        $sendEmail = new EmailSender(new PhpMail(new MailConf(env('MAIL_HOST'), env('MAIL_USERNAME'), env('MAIL_PASSWORD'))));
        $result = $sendEmail->send($emailMessage);
        return json_encode(['status' => $result, 'message' => 'Email sent successfully']);
    }

    public function setPasswordPage($email)
    {
        if (!User::where('email', $email)->exists()) {
            return json_encode("Access Denied");
        }
        return view('dashboard/set-password-view')->with(['email' => $email]);
    }

    public function changePassword(Request $request)
    {
        if (!User::where('email', $request->email)->exists()) {
            return json_encode(['status' => false, 'message' => 'Access Denied']);
        }
        $user = User::where('email', $request->email)->first();
        $user->password = md5($request->password);
        return json_encode(['status' => $user->update(), 'message' => 'Password updated successfully!']);
    }
}
