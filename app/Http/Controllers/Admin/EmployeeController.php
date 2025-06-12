<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    public function index() {
        $employees = DB::table('employees')->get();
        return view('admin.employees_create', compact('employees'));
    }

    // public function create() {
    //     return view('admin.employees.create');
    // }

    public function store(Request $request) {
        DB::table('employees')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back();
    }

    public function destroy($id)
{
    DB::table('employees')->where('id', $id)->delete();
    return redirect()->back();
}

public function show($id)
{
    return redirect()->back();
}


}
