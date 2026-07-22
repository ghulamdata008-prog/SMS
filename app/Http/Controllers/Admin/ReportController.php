<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Mark;



class ReportController extends Controller
{


    public function index()
    {


        $students = Student::count();


        $teachers = Teacher::count();


        $classes = SchoolClass::count();


        $subjects = Subject::count();



        $totalAttendance = Attendance::count();


        $totalMarks = Mark::count();



        return view(
            'admin.reports.index',
            compact(
                'students',
                'teachers',
                'classes',
                'subjects',
                'totalAttendance',
                'totalMarks'
            )
        );


    }





    // Student Report

    public function students()
    {


       $students = Student::with([
    'schoolClass',
    'section'
])->get();


        return view(
            'admin.reports.students',
            compact('students')
        );


    }





    // Attendance Report

    public function attendance()
    {


        $attendance = Attendance::with('student')
        ->latest()
        ->get();



        return view(
            'admin.reports.attendance',
            compact('attendance')
        );


    }





    // Result Report

    public function marks()
    {


        $marks = Mark::with([
            'student',
            'subject'
        ])
        ->get();



        return view(
            'admin.reports.marks',
            compact('marks')
        );


    }



}