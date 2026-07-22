<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use App\Models\TeacherSubject;
use App\Models\Mark;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        // Total Subjects
        $subjects = TeacherSubject::where('school_class_id', $student->class_id)
            ->where('section_id', $student->section_id)
            ->count();

        // Attendance
        $totalAttendance = Attendance::where('student_id', $student->id)->count();

        $presentAttendance = Attendance::where('student_id', $student->id)
            ->where('status', 'Present')
            ->count();

        $attendancePercentage = $totalAttendance > 0
            ? round(($presentAttendance / $totalAttendance) * 100)
            : 0;

        // Total Results
        $marks = Mark::where('student_id', $student->id)->count();

        return view('student.dashboard', compact(
            'student',
            'subjects',
            'attendancePercentage',
            'marks'
        ));
    }
}