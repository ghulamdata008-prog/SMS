<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;   
use App\Models\Exam;

class AdminExamController extends Controller
{
    public function index()
    {
       $exams = Exam::with([
    'teacher.user',
    'schoolClass',
    'subject'
])->latest()->paginate(10);
        

        return view('admin.exams.index', compact('exams'));
    }

    public function show(Exam $exam)
    {
       $exam->load([
    'teacher.user',
    'schoolClass',
    'subject',
    'questions'
]);

        return view('admin.exams.show', compact('exam'));
    }

  public function approve(Exam $exam)
{
    $exam->load('questions');


    if ($exam->questions->isEmpty()) {

        return back()
            ->with('error', 'Please add questions before approving this exam.');
    }


    $exam->update([
        'status' => 'Approved'
    ]);


    return back()
        ->with('success', 'Exam Approved Successfully.');
}

    public function reject(Exam $exam)
    {
        $exam->update([
            'status' => 'Rejected'
        ]);

        return redirect()
            ->route('admin.exams.index')
            ->with('success', 'Exam Rejected Successfully.');
    }
}