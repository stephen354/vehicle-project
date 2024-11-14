<?php

namespace App\Http\Controllers;

use App\Exports\ExportLogApproval;
use App\Models\Booking;
use Maatwebsite\Excel\Facades\Excel;

class ApprovalHistoryController extends Controller
{
    public function index(){
        $data = Booking::with('Approve.Users','Vehicle')->get();
        return view('approval_history', compact('data'));
    }

    function export_excel()
    {
        return Excel::download(new ExportLogApproval,"LogApproval.xlsx");
    }
}
