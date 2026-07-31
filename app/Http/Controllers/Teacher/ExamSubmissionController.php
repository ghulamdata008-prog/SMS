<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ExamSubmission;
use App\Models\Teacher;

class ExamSubmissionController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

        $submissions = ExamSubmission::with([
            'student.schoolClass',
            'student.section',
            'exam.subject'
        ])
        ->whereHas('exam', function ($q) use ($teacher) {
            $q->where('teacher_id', $teacher->id);
        })
        ->latest()
        ->get();

        return view(
            'teacher.exam-submissions.index',
            compact('submissions')
        );
    }
    public function show(ExamSubmission $submission)
{
    $submission->load([

        'student.schoolClass',

        'student.section',

        'exam.subject',

        'answers.question',

    ]);

    return view(
        'teacher.exam-submissions.show',
        compact('submission')
    );
}
public function publish(ExamSubmission $submission)
{
    $submission->load('answers.question');

    $obtained = 0;
    $total = 0;

    foreach ($submission->answers as $answer) {

        $total += $answer->question->marks;

        if ($answer->is_correct) {
            $obtained += $answer->question->marks;
        }

    }

    $submission->update([

        'obtained_marks' => $obtained,

        'total_marks' => $total,

        'result' => $obtained >= ($submission->exam->passing_marks)
                        ? 'Pass'
                        : 'Fail',

        'status' => 'Published',

    ]);

    return back()->with(
        'success',
        'Result Published Successfully.'
    );
}
}