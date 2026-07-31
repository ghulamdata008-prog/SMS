<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamSubmission;

class ExamSubmissionController extends Controller
{
    public function index()
    {
      $submissions = ExamSubmission::with([
    'student.schoolClass',
    'student.section',
    'exam.subject',
    'exam.teacher.user',
])
->where('status', 'Published')
->latest()
->paginate(10);
        return view(
            'admin.exam-submissions.index',
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
            'admin.exam-submissions.show',
            compact('submission')
        );
    }
}