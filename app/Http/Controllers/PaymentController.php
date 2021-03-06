<?php

namespace App\Http\Controllers;

use App\CallRequestTable;
use App\ExpertiseAreaTable;
use App\PaymentTable;
use App\UserMoneyTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function viewPaymentPage()
    {
        if (PaymentTable::where('user_id', Session::get('userId'))->exists()) {
            $paymentTableData = PaymentTable::where('user_id', Session::get('userId'))->first();
            $paymentTableData['countryArray'] = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
            $paymentTableData['monthArray'] = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",);
        } else {
            $paymentTableData = [];
            $paymentTableData['expiry_month'] = '';
            $paymentTableData['expiry_year'] = '';
            $paymentTableData['country'] = '';
            $paymentTableData['countryArray'] = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");
            $paymentTableData['monthArray'] = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",);
        }
        return view('dashboard/payment')->with(['paymentTableData' => $paymentTableData]);
    }

    public function savePaymentInfo(Request $request)
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
            if (!PaymentTable::where('user_id', Session::get('userId'))->exists()) {
                $paymentTable = new PaymentTable();
                $paymentTable->user_id = Session::get('userId');
                $paymentTable->card_number = $request->cardNumber;
                $paymentTable->cvv = $request->cvv;
                $paymentTable->expiry_month = $request->month;
                $paymentTable->expiry_year = $request->year;
                $paymentTable->address_line1 = $request->addressLine1;
                $paymentTable->address_line2 = $request->addressLine2;
                $paymentTable->city = $request->city;
                $paymentTable->state = $request->state;
                $paymentTable->postal_code = $request->postalCode;
                $paymentTable->country = $request->country;
                return json_encode(['status' => $paymentTable->save()]);
            } else {
                $paymentTable = PaymentTable::where('user_id', Session::get('userId'))->first();
                $paymentTable->card_number = $request->cardNumber;
                $paymentTable->cvv = $request->cvv;
                $paymentTable->expiry_month = $request->month;
                $paymentTable->expiry_year = $request->year;
                $paymentTable->address_line1 = $request->addressLine1;
                $paymentTable->address_line2 = $request->addressLine2;
                $paymentTable->city = $request->city;
                $paymentTable->state = $request->state;
                $paymentTable->postal_code = $request->postalCode;
                $paymentTable->country = $request->country;
                return json_encode(['status' => $paymentTable->update()]);
            }
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function savePaidMoneyData()
    {
        try {
            $cost = 0;
            $callRequestData = array();
            if (!empty(Session::get('userId'))) {
                $tomorrow = date("Y-m-d", strtotime("+1 day"));
                if (!ExpertiseAreaTable::where('id_user', Session::get('userId'))->exists()) {
                    return json_encode("user is not expert");
                }
                $expertId = ExpertiseAreaTable::where('id_user', Session::get('userId'))->first()['id'];
                if (!CallRequestTable::where([['id_journalist', '=', $expertId], ['status', '!=', 'completed']])->exists()) {
                    return json_encode("Call Data not found");
                }
                $callRequestTableData = CallRequestTable::where([['id_journalist', '=', $expertId], ['status', '!=', 'completed']])->get();
                for ($i = 0; $i < count($callRequestTableData); $i++) {
                    if (!empty($callRequestTableData[$i]->scheduled_date_time)) {
                        $scheduledDate = explode(' ', $callRequestTableData[$i]->scheduled_date_time)[0];
                        if ($tomorrow > date($scheduledDate)) {
                            array_push($callRequestData, $callRequestTableData[$i]);
                        }
                    }
                }
                for ($i = 0; $i < count($callRequestData); $i++) {
                    $cost = $cost + (int)$callRequestData[$i]['call_total_Costs'];
                    $requestStatus = CallRequestTable::where('id', $callRequestData[$i]["id"])->first();
                    $requestStatus->status = "completed";
                    $requestStatus->approval_status = "completed";
                    $requestStatus->update();
                }
                if ($cost > 0) {
                    $userMoneyTable = new UserMoneyTable();
                    $userMoneyTable->user_id = Session::get('userId');
                    $userMoneyTable->money = $cost;
                    $userMoneyTable->status = 'pending';
                    $userMoneyTable->save();
                }

            } else {
                return json_encode("session issue");
            }
        } catch (\Exception $exception) {
            return json_encode($exception);
        }

    }

}
