<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Attendance;


class AttendanceController extends Controller
{


public function index()
{

$attendances = Attendance::with('student')
->latest()
->get();


return view(
'admin.attendance.index',
compact('attendances')
);


}


}