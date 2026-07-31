<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->id())->first();

        $exams = Exam::where('teacher_id', $teacher->id)
            ->with('schoolClass','subject')
            ->latest()
            ->paginate(10);

        return view('teacher.exams.index', compact('exams'));
    }

    public function create()
    {
        $classes = SchoolClass::all();

        $subjects = Subject::all();

        return view('teacher.exams.create', compact(
            'classes',
            'subjects'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([

            'class_id'=>'required',

            'subject_id'=>'required',

            'title'=>'required',

            'total_marks'=>'required|numeric',

            'passing_marks'=>'required|numeric',

            'exam_date'=>'required|date',

            'start_time'=>'required',

            'end_time'=>'required',

        ]);

        $teacher = Teacher::where('user_id',auth()->id())->first();

        Exam::create([

            'teacher_id'=>$teacher->id,

            'class_id'=>$request->class_id,

            'subject_id'=>$request->subject_id,

            'title'=>$request->title,

            'description'=>$request->description,

            'total_marks'=>$request->total_marks,

            'passing_marks'=>$request->passing_marks,

            'exam_date'=>$request->exam_date,

            'start_time'=>$request->start_time,

            'end_time'=>$request->end_time,

            'status'=>'Pending',

        ]);

        return redirect()
            ->route('teacher.exams.index')
            ->with('success','Exam Created Successfully and waiting for Admin Approval.');
    }

    public function show(Exam $exam)
    {
        return view('teacher.exams.show', compact('exam'));
    }

    public function edit(Exam $exam)
    {
        $classes = SchoolClass::all();

        $subjects = Subject::all();

        return view('teacher.exams.edit', compact(
            'exam',
            'classes',
            'subjects'
        ));
    }

    public function update(Request $request, Exam $exam)
    {
        $exam->update($request->all());

        return redirect()
            ->route('teacher.exams.index')
            ->with('success','Exam Updated Successfully.');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()
            ->route('teacher.exams.index')
            ->with('success','Exam Deleted Successfully.');
    }
}