<?php

namespace App\Http\Controllers;

use App\CallRequestTable;
use Illuminate\Http\Request;

class CallRequestController extends Controller
{
    public function acceptRequest(Request $request)
    {
        try {
            $callRequest = CallRequestTable::where('id', $request->callId)->first();
            $callRequest->scheduled_date_time = $request->selectedTime;
            $callRequest->approval_status = 'approved';
            $callRequest->status = 'scheduled';
            return json_encode($callRequest->update());
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function rejectRequest(Request $request)
    {
        try {
            $callRequest=CallRequestTable::where('id',$request->callId)->first();
            $callRequest->approval_status = 'Rejected';
            $callRequest->status = 'Rejected';
            return json_encode($callRequest->update());

        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

}
