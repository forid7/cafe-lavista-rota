<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     $start = Carbon::now()->startOfWeek();
    //     $end = Carbon::now()->endOfWeek();

    //     $schedules = DB::table('schedules')
    //         ->join('employees', 'schedules.employee_id', '=', 'employees.id')
    //         ->leftJoin('shifts', 'schedules.shift_id', '=', 'shifts.id')
    //         ->whereBetween('work_date', [$start, $end])
    //         ->select(
    //             'schedules.*',
    //             'employees.name as employee_name',
    //             'shifts.name as shift_name',
    //             'shifts.start_time',
    //             'shifts.end_time',
    //             'shifts.css_class'
    //         )
    //         ->get()
    //         ->groupBy('employee_id');

    //     return view('admin.dashboard', compact('schedules'));
    // }

    public function dashboard(Request $request)
    {
        // $start = Carbon::now()->startOfWeek();
        // $end = Carbon::now()->endOfWeek();

        // $start = Carbon::parse('2025-06-02');
        // $end = Carbon::parse('2025-06-08');

        $start = $request->input('start_date', '2025-06-02'); // default if not provided
    $start = \Carbon\Carbon::parse($start);
    $end = $start->copy()->addDays(6); // end of the week

        $schedules = DB::table('schedules')
            ->join('employees', 'schedules.employee_id', '=', 'employees.id')
            ->leftJoin('shifts', 'schedules.shift_id', '=', 'shifts.id')
            ->whereBetween('work_date', [$start, $end])
            ->select(
                'schedules.*',
                'employees.name as employee_name',
                'shifts.name as shift_name',
                'shifts.start_time',
                'shifts.end_time',
                'shifts.css_class'
            )
            ->get()
            ->groupBy('employee_id');

            // dd($schedules);

            // Calculate total hours
$weeklyHours = [];

foreach ($schedules as $employeeId => $days) {
    $total = 0;
    foreach ($days as $day) {
        if ($day->start_time && $day->end_time) {
            $startTime = \Carbon\Carbon::parse($day->start_time);
            $endTime = \Carbon\Carbon::parse($day->end_time);
            $hours = $endTime->diffInHours($startTime);
            // Adjust for overnight shifts (e.g., 21:00 - 09:00)
            if ($endTime < $startTime) {
                $hours += 24;
            }
            $total += $hours;
        }
    }
    $weeklyHours[$employeeId] = $total;
}

        $employees = DB::table('employees')->get();
        $shifts = DB::table('shifts')->get();
        // $schedules = DB::table('schedules')->get();

        return view('admin.dashboard', compact('schedules','start','weeklyHours','employees','shifts'));
    }


}
