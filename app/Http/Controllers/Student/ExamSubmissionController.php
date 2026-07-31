<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamSubmission;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamSubmissionController extends Controller
{
    public function store(Request $request, Exam $exam)
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();
 
        // Prevent duplicate submission
        $alreadySubmitted = ExamSubmission::where('exam_id', $exam->id)
            ->where('student_id', $student->id)
            ->exists();

        if ($alreadySubmitted) {
            return redirect()
                ->route('student.exams.index')
                ->with('error', 'You have already submitted this exam.');
        }

        $obtainedMarks = 0;

        foreach ($exam->questions as $question) {

            $answer = $request->input('answers.' . $question->id);

            if ($answer == $question->correct_answer) {
                $obtainedMarks++;
            }
        }

        $totalMarks = $exam->questions->count();

        $percentage = $totalMarks > 0
            ? ($obtainedMarks / $totalMarks) * 100
            : 0;

       ExamSubmission::create([
    'exam_id'        => $exam->id,
    'student_id'     => $student->id,
    'submitted_at'   => now(),
]);

        return redirect()
            ->route('student.results')
            ->with('success', 'Exam submitted successfully.');
    }
}