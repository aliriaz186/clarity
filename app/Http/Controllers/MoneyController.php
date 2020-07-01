<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Stripe\Stripe;
use App\UserMoneyTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\StripeClient;

class MoneyController extends Controller
{
    public function viewMoneyPage()
    {
        $money = 0;
        $paymentTable = UserMoneyTable::where(['user_id' => Session::get('userId'), 'status' => 'pending'])->get();
        foreach ($paymentTable as $item) {
            $money = $money + $item->money;
        }
        $paymentTableData['monthArray'] = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12",);
        return view('dashboard/money')->with(['money' => $money, 'paymentTableData' => $paymentTableData]);
    }

    public function userGetPaid(Request $request)
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
            $stripeClient = \Stripe\Stripe(env('STRIPE_SECRET'));
            $stripeClient->transfers->create([
                'amount' => $request->money,
                'currency' => 'usd',
                'destination' => $token['id'],
                'transfer_group' => 'ORDER_95',
            ]);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

}
