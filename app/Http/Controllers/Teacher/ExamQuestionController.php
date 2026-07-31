<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function index(Exam $exam)
    {
        $questions = $exam->questions()->latest()->get();

        return view(
            'teacher.exams.questions.index',
            compact('exam','questions')
        );
    }

    public function create(Exam $exam)
    {
        return view(
            'teacher.exams.questions.create',
            compact('exam')
        );
    }

    public function store(Request $request, Exam $exam)
    {
        $request->validate([

            'question' => 'required',

            'option_a' => 'required',

            'option_b' => 'required',

            'option_c' => 'required',

            'option_d' => 'required',

            'correct_answer' => 'required|in:A,B,C,D',

            'marks' => 'required|integer|min:1',

        ]);

        ExamQuestion::create([

            'exam_id' => $exam->id,

            'question' => $request->question,

            'option_a' => $request->option_a,

            'option_b' => $request->option_b,

            'option_c' => $request->option_c,

            'option_d' => $request->option_d,

            'correct_answer' => $request->correct_answer,

            'marks' => $request->marks,

        ]);

        return redirect()
            ->route('teacher.exams.questions',$exam)
            ->with('success','Question Added Successfully.');
    }

    public function destroy(ExamQuestion $question)
    {
        $exam = $question->exam;

        $question->delete();

        return redirect()
            ->route('teacher.exams.questions',$exam)
            ->with('success','Question Deleted Successfully.');
    }
}