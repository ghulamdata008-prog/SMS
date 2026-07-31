<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Exam;
use App\Models\TeacherSubject;
use App\Models\Student;

use App\Models\Mark;

class MarkController extends Controller
{
    public function index()
{
    $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

    // Sirf approved exams jo is teacher ke hain
    $exams = \App\Models\Exam::with([
        'schoolClass',
        'subject'
    ])
    ->where('teacher_id', $teacher->id)
    ->where('status', 'Approved')
    ->latest()
    ->get();

    $students = collect();

    return view(
        'teacher.marks.index',
        compact(
            'students',
            'exams'
        )
    );
}
    public function store(Request $request)
{
    $request->validate([
    'exam_id' => 'required|exists:exams,id',
    'marks' => 'required|array',
]);

$exam = Exam::findOrFail($request->exam_id);

$teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

foreach ($request->marks as $studentId => $obtained) {

    if ($obtained > $exam->total_marks) {
        return back()->withErrors([
            'marks' => 'Obtained marks cannot exceed total marks.'
        ]);
    }

    $grade = 'F';

    $percentage = ($obtained / $exam->total_marks) * 100;

    if ($percentage >= 80) {
        $grade = 'A';
    } elseif ($percentage >= 70) {
        $grade = 'B';
    } elseif ($percentage >= 60) {
        $grade = 'C';
    } elseif ($percentage >= 50) {
        $grade = 'D';
    }

   Mark::updateOrCreate(

    [
        'exam_id' => $exam->id,
        'student_id' => $studentId,
    ],

    [
        'teacher_id'     => $teacher->id,
        'subject_id'     => $exam->subject_id,
        'total_marks'    => $exam->total_marks,
        'obtained_marks' => $obtained,
        'grade'          => $grade,
        'status'         => $obtained >= $exam->passing_marks ? 'Pass' : 'Fail',
    ]
);
}

return redirect()
    ->route('teacher.marks.view')
    ->with('success', 'Marks saved successfully.');
}
public function create(Exam $exam)
{
    $students = Student::with([
        'schoolClass',
        'section'
    ])
    ->where('class_id', $exam->class_id)
    ->get();

    return view(
        'teacher.marks.create',
        compact('exam', 'students')
    );
}
public function view()
{
    $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

    $marks = Mark::with([
        'student',
        'subject',
        'exam'
    ])
    ->where('teacher_id', $teacher->id)
    ->paginate(10);


    return view('teacher.marks.view', compact('marks'));
}

public function update(Request $request, Mark $mark)
{
    $request->validate([
    'obtained_marks' => 'required|integer|min:0',
    'total_marks' => 'required|integer|min:1',
]);

if ($request->obtained_marks > $request->total_marks) {
    return back()
        ->withInput()
        ->withErrors([
            'obtained_marks' => 'Obtained Marks cannot be greater than Total Marks.'
        ]);
}
$percentage = ($request->obtained_marks / $request->total_marks) * 100;

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
   $mark->update([

    'obtained_marks' => $request->obtained_marks,

    'total_marks' => $request->total_marks,

    'grade' => $grade,

    'status' => $request->obtained_marks >= ($mark->exam->passing_marks ?? 0)
        ? 'Pass'
        : 'Fail',

]);

    return redirect()
        ->route('teacher.marks.view')
        ->with('success', 'Marks Updated Successfully');
}

public function destroy(Mark $mark)
{
    $mark->delete();

    return back()->with(
        'success',
        'Marks Deleted Successfully'
    );
}
public function edit(Mark $mark)
{
    $mark->load([
        'student',
        'subject',
        'exam'
    ]);

    return view(
        'teacher.marks.edit',
        compact('mark')
    );
}
}