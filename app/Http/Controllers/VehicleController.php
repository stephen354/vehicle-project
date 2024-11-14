<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vehicle::orderBy("created_at","DESC")->get();

        return view('vehicle', compact('data'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $requestData = $request->only([
            'vehicle_id',
            'name',
            'type',
            'status'
        ]);
        $vehicle_id = $requestData['vehicle_id'] ?? null;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'status' => 'required|not_in:0'
        ],
        [
            'status.not_in' => 'Please select a valid status vehicle.'
        ]);

        if ($validator->fails()) {
            $errors = collect($validator->errors())->map(function($item) {
                return collect($item)->first();
            })->first();
             // Redirect dengan pesan flash
            return redirect('/vehicle')->with('errors', $errors);
        }

        Vehicle::updateOrCreate(
            ['id' => $vehicle_id], // condition untuk mencari req yang akan diupdate
                [
                    'name' => $requestData['name'],
                    'type' => $requestData['type'],
                    'status' => $requestData['status']
                ]
        );
        return redirect('/vehicle')->with('success', "Success!");
    }

    public function delete(Request $request){
        $id = $request->input('id');
        // dd($id);
        $count = Booking::where('vehicle_id',$id)->count();
        if($count != 0 ){
            return redirect('/vehicle')->with('errors', "This Vehicle cannot deleted");
        }
        $data = Vehicle::find($id);
        if($data){
            $data->delete();
            return redirect('/vehicle')->with('success', "Success!");
        }else{
            return redirect('/vehicle')->with('errors', "ID Not Found");
        }
    }

    
}
