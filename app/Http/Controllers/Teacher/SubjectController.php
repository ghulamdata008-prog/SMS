<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\Student;

class SubjectController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where(
            'user_id',
            auth()->id()
        )->firstOrFail();

        $subjects = TeacherSubject::with([
            'subject',
            'schoolClass',
            'section'
        ])
        ->where('teacher_id', $teacher->id)
        ->get();

        return view(
            'teacher.subjects.index',
            compact('subjects')
        );
    }

    public function show($id)
    {
        $teacher = Teacher::where(
            'user_id',
            auth()->id()
        )->firstOrFail();

        $assignment = TeacherSubject::with([
            'subject',
            'schoolClass',
            'section'
        ])
        ->where('teacher_id', $teacher->id)
        ->findOrFail($id);

        $students = Student::where(
            'class_id',
            $assignment->school_class_id
        )
        ->where(
            'section_id',
            $assignment->section_id
        )
        ->get();

        return view(
            'teacher.subjects.show',
            compact(
                'assignment',
                'students'
            )
        );
    }
}