<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherSubject;

class MyClassController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->id())->first();

        if (!$teacher) {
            abort(404, 'Teacher not found.');
        }

        $assignments = TeacherSubject::with([
            'schoolClass',
            'section',
            'subject'
        ])
        ->where('teacher_id', $teacher->id)
        ->get();

        return view('teacher.my-classes.index', compact('assignments'));
    }
}