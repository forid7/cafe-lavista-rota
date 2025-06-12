<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    public function run()
    {
        $shifts = [
            ['Morning', '09:00', '17:00', 'shift-morning'],
            ['Afternoon', '13:00', '21:00', 'shift-afternoon'],
            ['Evening', '17:00', '01:00', 'shift-evening'],
            ['Night', '21:00', '09:00', 'shift-night'],
            ['Off', null, null, 'shift-off']
        ];

        foreach ($shifts as [$name, $start, $end, $css]) {
            DB::table('shifts')->insert([
                'name' => $name,
                'start_time' => $start,
                'end_time' => $end,
                'css_class' => $css,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
