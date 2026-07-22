<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Mark;

class DashboardController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

        $assignments = TeacherSubject::where('teacher_id', $teacher->id)->get();

        $students = Student::where(function ($query) use ($assignments) {

            foreach ($assignments as $assignment) {

                $query->orWhere(function ($q) use ($assignment) {

                    $q->where('class_id', $assignment->school_class_id)
                      ->where('section_id', $assignment->section_id);

                });
            }

        })->count();

        $subjects = $assignments->count();

        $attendance = Attendance::where('teacher_id', $teacher->id)->count();
// $marks = 0;
        // $marks = Mark::where('teacher_id', $teacher->id)->count();

        return view('teacher.dashboard', compact(
            'students',
            'subjects',
            'attendance',
           
        ));
    }
}