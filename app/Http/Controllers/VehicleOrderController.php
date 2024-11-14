<?php

namespace App\Http\Controllers;

use App\Models\ApproveBooking;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleOrderController extends Controller
{
    public function index()
    {
        $data = Vehicle::where('status','Ready')->get();
        $user = User::where('role', '!=', 1)->get();
        return view('vehicle_order', compact('data','user'));
      
    }

    public function store(Request $request){
        
        $requestData = $request->only([
            'booking_id',
            'name',
            'purpose',
            'date_start',
            'date_end',
            'user_1',
            'user_2',
            'vehicle_id',
            'description'
        ]);

        $booking_id = $requestData['booking_id'] ?? null;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'purpose' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'user_1' => 'required',
            'user_2' => 'required|different:user_1',
            'vehicle_id' => 'required',
            'description' => 'nullable',
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->map(function($item) {
                return collect($item)->first();
            })->first();
             // Redirect dengan pesan flash
            return redirect('/vehicle-order')->with('errors', $errors);
        }
        
        $data = Booking::updateOrCreate(
            ['id' => $booking_id], // condition untuk mencari req yang akan diupdate
                [
                    'vehicle_id' => $requestData['vehicle_id'],
                    'user_id' => 1,
                    'booker_name' => $requestData['name'],
                    'purpose' => $requestData['purpose'],
                    'date' => $requestData['date_start'],
                    'date_end' => $requestData['date_end'],
                    'vehicle_condition' => $requestData['description']
                ]
        );

        ApproveBooking::create([
            'booking_id' => $data->id,
            'user_id' => $requestData['user_1']
        ]);

        ApproveBooking::create([
            'booking_id' => $data->id,
            'user_id' => $requestData['user_2']
        ]);

        $data = Vehicle::where('id', $requestData['vehicle_id'])->update([
            'status' => 'Booking',
        ]);

        return redirect('/vehicle-order')->with('success', "Success!");

    }

    public function delete(Request $request){
        $id = $request->input('id');
        // dd($id);
        $count = ApproveBooking::where('booking_id',$id)->where('status','!=','0')->count();
        if($count != 0 ){
            return redirect('/approval')->with('errors', "This Order cannot deleted");
        }
        $data = Booking::find($id);
        if($data){
            $data->delete();
            return redirect('/approval')->with('success', "Success!");
        }else{
            return redirect('/approval')->with('errors', "ID Not Found");
        }
    }
}
