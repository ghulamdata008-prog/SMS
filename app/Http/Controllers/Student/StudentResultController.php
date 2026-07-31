<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Mark;
use App\Models\ExamSubmission;

class StudentResultController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        // Manual Subject Results
        $marks = Mark::with([
            'subject',
            'teacher'
        ])
        ->where('student_id', $student->id)
        ->get();

        // Online Exam Results
       $examResults = ExamSubmission::with('exam')
    ->where('student_id', $student->id)
    ->whereNotNull('obtained_marks')
    ->latest()
    ->get();
        $totalMarks = $marks->sum('total_marks');
        $obtainedMarks = $marks->sum('obtained_marks');

        $percentage = $totalMarks > 0
            ? round(($obtainedMarks / $totalMarks) * 100, 2)
            : 0;

        if ($percentage >= 90) {
            $grade = 'A+';
        } elseif ($percentage >= 80) {
            $grade = 'A';
        } elseif ($percentage >= 70) {
            $grade = 'B';
        } elseif ($percentage >= 60) {
            $grade = 'C';
        } elseif ($percentage >= 50) {
            $grade = 'D';
        } else {
            $grade = 'F';
        }

        return view(
            'student.results.index',
            compact(
                'marks',
                'examResults',
                'totalMarks',
                'obtainedMarks',
                'percentage',
                'grade'
            )
        );
    }
}