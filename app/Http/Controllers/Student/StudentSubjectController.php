<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\TeacherSubject;

class StudentSubjectController extends Controller
{
    public function index()
    {
        // Logged in student's record
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        // Fetch subjects assigned to the student's class & section
        $subjects = TeacherSubject::with([
            'subject',
            'teacher',
            'schoolClass',
            'section'
        ])
        ->where('school_class_id', $student->class_id)
        ->where('section_id', $student->section_id)
        ->get();

        return view(
            'student.subjects.index',
            compact('student', 'subjects')
        );
    }
}