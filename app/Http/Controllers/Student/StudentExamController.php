<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamSubmission;
use App\Models\ExamAnswer;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentExamController extends Controller
{
   public function index()
{
    $student = Student::where('user_id', auth()->id())->first();

    $exams = Exam::where('status', 'Approved')
        ->where('class_id', $student->class_id)
        ->with('subject')
        ->latest()
        ->get();

    $submittedExamIds = ExamSubmission::where('student_id', $student->id)
        ->pluck('exam_id')
        ->toArray();

    return view(
        'student.exams.index',
        compact('exams', 'submittedExamIds')
    );
}
    public function show(Exam $exam)
{
    $student = Student::where('user_id', auth()->id())->first();

    $alreadySubmitted = ExamSubmission::where('exam_id', $exam->id)
        ->where('student_id', $student->id)
        ->exists();

    if ($alreadySubmitted) {

        return redirect()
            ->route('student.exams.index')
            ->with('error', 'You have already submitted this exam.');

    }

    $exam->load('questions');

    return view('student.exams.show', compact('exam'));
}

   public function submit(Request $request, Exam $exam)
{
    $student = Student::where('user_id', auth()->id())->firstOrFail();

    // Already submitted
    if (
        ExamSubmission::where('exam_id', $exam->id)
            ->where('student_id', $student->id)
            ->exists()
    ) {
        return back()->with('error', 'You have already submitted this exam.');
    }

    // Create submission
    $submission = ExamSubmission::create([

        'exam_id'        => $exam->id,

        'student_id'     => $student->id,

        'status'         => 'Pending',

        'submitted_at'   => now(),

    ]);

    foreach ($exam->questions as $question) {

        $answer = $request->answer[$question->id] ?? null;

        $isCorrect = $answer == $question->correct_answer;

        $marks = $isCorrect ? $question->marks : 0;

        ExamAnswer::create([

            'exam_submission_id' => $submission->id,

            'question_id'        => $question->id,

            'student_answer'     => $answer,

            'is_correct'         => $isCorrect,

            'marks'              => $marks,

        ]);
    }

    return redirect()
        ->route('student.exams.index')
        ->with('success', 'Exam Submitted Successfully. Waiting for teacher review.');
}
}