<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Mark;

class StudentResultController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        $marks = Mark::with([
            'subject',
            'teacher'
        ])
        ->where('student_id', $student->id)
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
                'totalMarks',
                'obtainedMarks',
                'percentage',
                'grade'
            )
        );
    }
}