<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;


class StudentAttendanceController extends Controller
{


   public function index()
{

    $student = auth()->user()->student;


    $attendance = Attendance::where(
        'student_id',
        $student->id
    )
    ->latest()
    ->get();



    return view(
        'student.attendance.index',
        compact('attendance')
    );

}
}