<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ScheduleImport;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleController extends Controller
{
    public function index() {
        return view('schedules.index');
    }

    public function import(Request $request) {
        Excel::import(new ScheduleImport, $request->schedule);

        return redirect()->back();
    }
}
