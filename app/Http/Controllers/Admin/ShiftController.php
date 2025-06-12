<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function index() {
        $shifts = DB::table('shifts')->get();
        return view('admin.shifts.index', compact('shifts'));
    }

    // public function create() {
    //     return view('admin.shifts.create');
    // }

    public function store(Request $request) {
        DB::table('shifts')->insert([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'css_class' => $request->css_class,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }
}
