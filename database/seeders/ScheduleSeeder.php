<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $employees = DB::table('employees')->pluck('id');
        $shifts = DB::table('shifts')->pluck('id');
        $startOfWeek = Carbon::now()->startOfWeek();

        foreach ($employees as $employee_id) {
            foreach (range(0, 6) as $i) {
                DB::table('schedules')->insert([
                    'employee_id' => $employee_id,
                    'shift_id' => $shifts->random(),
                    'work_date' => $startOfWeek->copy()->addDays($i)->toDateString(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
