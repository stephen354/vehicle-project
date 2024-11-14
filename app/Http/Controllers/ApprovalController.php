<?php

namespace App\Http\Controllers;

use App\Models\ApproveBooking;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::with('Approve.Users','Vehicle')->where('status',0)->get();
        return view('/approval', compact('data'));
    }

    public function store(Request $request){
        $requestData = $request->only([
            'approve_id',
            'booking_id',
            'note',
            'status'
        ]);
        $approve_id = $requestData['approve_id'] ?? null;

        $validator = Validator::make($request->all(), [
            'approve_id' => 'required|exists:approve_bookings,id',
            'booking_id' => 'required|exists:bookings,id',
            'note' => 'nullable',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->map(function($item) {
                return collect($item)->first();
            })->first();
             // Redirect dengan pesan flash
            return redirect('/approval')->with('errors', $errors);
        }

        ApproveBooking::where('id', $approve_id)->update([
            'note' => $requestData['note'],
            'status' => $requestData['status'],
        ]);

        $booking = ApproveBooking::where('booking_id',$requestData['booking_id'])->get();
        
        $validation = 0;
        foreach ($booking as $item) {
            if($item->status == 1){ 
                $validation = 1;
            }else if($item->status == 2){
                $validation = 2;
                break;
            }else{
                $validation = 0;
                break;
            }
        }

        if($validation){
            Booking::where('id', $requestData['booking_id'])->update([
                'status' => $validation,
            ]);
        }

        return redirect('/approval')->with('success', "Success!");
    }

}
