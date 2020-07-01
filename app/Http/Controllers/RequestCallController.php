<?php

namespace App\Http\Controllers;

use App\CallPaymentInfoTable;
use App\CallRequestTable;
use App\ExpertiseAreaTable;
use App\PaymentTable;
use App\ProfileTable;
use App\User;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RequestCallController extends Controller
{
    public function viewRequestACallPage(int $journalistId)
    {
        if (empty(Session::get('userId'))) {
            return redirect('/login?source=request-a-call/' . $journalistId);
        }
        $journalistUserId = ExpertiseAreaTable::where('id', $journalistId)->first()['id_user'];
        if (PaymentTable::where('user_id', Session::get('userId'))->exists()) {
            $paymentTableData = PaymentTable::where('user_id', Session::get('userId'))->first();
            $paymentTableData['countryArray'] = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
            $paymentTableData['monthArray'] = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",);
            $paymentTableData['journalistId'] = $journalistId;
            $profileTable = ProfileTable::where('user_id', $journalistUserId)->first();
            $hourlyRate = $profileTable->hourly_rate;
            $paymentTableData['hourlyRate'] = $profileTable->hourly_rate;
            $paymentTableData['hourly15MinutesCost'] = ($hourlyRate / 2) / 2;
            $paymentTableData['hourly30MinutesCost'] = $hourlyRate / 2;
            $paymentTableData['hourly1HourCost'] = $hourlyRate;
            $paymentTableData['expert'] = ExpertiseAreaTable::where('id', $journalistId)->first();
        } else {
            $paymentTableData = [];
            $profileTable = ProfileTable::where('user_id', $journalistUserId)->first();
            $paymentTableData['hourlyRate'] = $profileTable->hourly_rate;
            $hourlyRate = $profileTable->hourly_rate;
            $paymentTableData['hourly15MinutesCost'] = ($hourlyRate / 2) / 2;
            $paymentTableData['hourly30MinutesCost'] = $hourlyRate / 2;
            $paymentTableData['hourly1HourCost'] = $hourlyRate;
            $paymentTableData['journalistId'] = $journalistId;
            $paymentTableData['expiry_month'] = '';
            $paymentTableData['expiry_year'] = '';
            $paymentTableData['country'] = '';
            $paymentTableData['countryArray'] = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
            $paymentTableData['monthArray'] = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",);
            $paymentTableData['expert'] = ExpertiseAreaTable::where('id', $journalistId)->first();
        }
        return view('landing-page/request-a-call')->with(['paymentTableData' => $paymentTableData]);
    }

    public function requestACall(Request $request)
    {
        try {
            $stripe = \Cartalyst\Stripe\Laravel\Facades\Stripe::setApiKey(env('STRIPE_SECRET'));
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->cardNumber,
                    'exp_month' => $request->month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cvv,
                ],
            ]);
            if (!isset($token['id'])) {
                return json_encode(['status' => false, 'message' => 'Token Id doenot exists!']);
            }
            if ($request->estimatedLength == "15 minutes") {
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $request->hourly15MinutesCost,
                    'description' => 'wallet',
                ]);
            } elseif ($request->estimatedLength == "30 minutes") {
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $request->hourly30MinutesCost,
                    'description' => 'wallet',
                ]);

            } else {
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $request->hourly1HourCost,
                    'description' => 'wallet',
                ]);

            }
            if ($charge['status'] == 'succeeded') {
                $user = User::where('id', Session::get('userId'))->first();
                $callRequestTable = new CallRequestTable();
                $callRequestTable->caller_name = $user->name;
                $callRequestTable->caller_email = $user->email;
                $callRequestTable->call_total_time = $request->estimatedLength;
                if ($request->estimatedLength == "15 minutes") {
                    $callRequestTable->call_total_Costs = $request->hourly15MinutesCost;
                } elseif ($request->estimatedLength == "30 minutes") {
                    $callRequestTable->call_total_Costs = $request->hourly30MinutesCost;
                } else {
                    $callRequestTable->call_total_Costs = $request->hourly1HourCost;
                }
                $callRequestTable->payment = 'paid';
                $suggestedTime1 = str_replace('T', ' ', $request->suggestedTime1);
                $callRequestTable->suggested_time_one = $suggestedTime1;
                $suggestedTime2 = str_replace('T', ' ', $request->suggestedTime2);
                $callRequestTable->suggested_time_two = $suggestedTime2;
                $suggestedTime3 = str_replace('T', ' ', $request->suggestedTime3);
                $callRequestTable->suggested_time_three = $suggestedTime3;
                $callRequestTable->id_journalist = $request->journalistId;
                $callRequestTable->status = 'due';
                $callRequestTable->approval_status = 'pending';
                $callRequestTable->message = $request->message;
                $callRequestTable->save();
                $callPaymentInfoTable = new CallPaymentInfoTable();
                $callPaymentInfoTable->call_id = $callRequestTable->id;
                if ($request->estimatedLength == "15 minutes") {
                    $callPaymentInfoTable->amount = $request->hourly15MinutesCost;
                } elseif ($request->estimatedLength == "30 minutes") {
                    $callPaymentInfoTable->amount = $request->hourly30MinutesCost;
                } else {
                    $callPaymentInfoTable->amount = $request->hourly1HourCost;
                }
                $callPaymentInfoTable->card_last_four_digits = substr($request->cardNumber, -4);
                $callPaymentInfoTable->expiry_month = $request->month;
                $callPaymentInfoTable->expiry_year = $request->year;
                return json_encode(['status' => $callPaymentInfoTable->save()]);
            } else {
                return json_encode(['status' => false, 'message' => 'Unsuccessful']);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }
}
