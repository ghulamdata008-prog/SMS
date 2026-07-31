<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExamSubmission;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

        $results = ExamSubmission::with([
            'student.schoolClass',
            'student.section',
            'exam.subject'
        ])

        ->where('status', 'Published')

        ->whereHas('exam', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })

        ->when($request->student_name, function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->student_name . '%');
            });
        })

        ->when($request->roll_no, function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('roll_no', 'like', '%' . $request->roll_no . '%');
            });
        })

        ->when($request->class_id, function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        })

        ->when($request->section_id, function ($query) use ($request) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('section_id', $request->section_id);
            });
        })

        ->latest()
        ->paginate(10)
        ->withQueryString();

        $classes = SchoolClass::orderBy('name')->get();

        $sections = Section::orderBy('name')->get();

        return view(
            'teacher.results.index',
            compact(
                'results',
                'classes',
                'sections'
            )
        );
    }

    public function show(ExamSubmission $submission)
    {
        $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

        if ($submission->exam->teacher_id != $teacher->id) {
            abort(403);
        }

        $submission->load([
            'student.schoolClass',
            'student.section',
            'exam.subject',
            'answers.question'
        ]);

        return view(
            'teacher.results.show',
            compact('submission')
        );
    }
}