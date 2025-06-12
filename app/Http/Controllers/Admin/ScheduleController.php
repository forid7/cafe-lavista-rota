<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = DB::table('schedules')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create() {
        $employees = DB::table('employees')->get();
        $shifts = DB::table('shifts')->get();
        $schedules = DB::table('schedules')->get();
        return view('admin.schedules_index', compact('employees', 'shifts','schedules'));
    }

    public function store(Request $request) {
        DB::table('schedules')->insert([
            'employee_id' => $request->employee_id,
            'shift_id' => $request->shift_id,
            'work_date' => $request->work_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }
}
