<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employees = [
            'John Smith', 'Sarah Johnson', 'Mike Wilson', 'Emma Davis',
            'Alex Brown', 'Lisa Taylor', 'Tom Anderson', 'Kate Miller'
        ];

        foreach ($employees as $name) {
            DB::table('employees')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
