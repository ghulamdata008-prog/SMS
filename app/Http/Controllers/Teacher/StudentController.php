<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

        $assignments = TeacherSubject::where('teacher_id', $teacher->id)->get();

        $students = Student::with([
                'schoolClass',
                'section'
            ])
            ->where(function ($query) use ($assignments) {

                foreach ($assignments as $assignment) {

                    $query->orWhere(function ($q) use ($assignment) {

                        $q->where('class_id', $assignment->school_class_id)
                          ->where('section_id', $assignment->section_id);

                    });

                }

            })
            ->latest()
            ->get();

        return view('teacher.students.index', compact('students'));
    }
}