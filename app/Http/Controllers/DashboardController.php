<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $dataTipe = Vehicle::select('vehicles.type', 
        DB::raw('COUNT(CASE WHEN bookings.status = 1 THEN 1 END) as accept'))
        ->join('bookings', 'vehicles.id', '=', 'bookings.vehicle_id')
        ->groupBy('vehicles.type')
        ->get();

        $count = Vehicle::select(
            DB::raw('COUNT(CASE WHEN bookings.status = 1 THEN 1 END) as accept_count')
        )
        ->join('bookings', 'vehicles.id', '=', 'bookings.vehicle_id')
        ->first();

        $tipe = [];
        
        if($count->accept_count !=0){
        foreach ($dataTipe as $item) {
            $persentase = ($item->accept / $count->accept_count) *100; 
            $tipe[] = [
                'type' => $item->type,
                'accept' => $item->accept,
                'division_result' => $persentase
            ];
        }
        }

        $dataVehicle = Vehicle::select('vehicles.name','vehicles.type' ,
        DB::raw('COUNT(CASE WHEN bookings.status = 0 THEN 1 END) as waiting'),
        DB::raw('COUNT(CASE WHEN bookings.status = 1 THEN 1 END) as accept'),
        DB::raw('COUNT(CASE WHEN bookings.status = 2 THEN 1 END) as decline'))
        ->join('bookings', 'vehicles.id', '=', 'bookings.vehicle_id')
        ->groupBy('vehicles.id')
        ->orderBy('accept','DESC')
        ->limit(5)
        ->get();

        $approval = Booking::with('Approve.Users','Vehicle')
        ->limit(5)
        ->orderBy('created_at','DESC')
        ->get();

        return view('index', compact('tipe','dataVehicle','approval'));
    }
}
