<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

use App\Models\TeacherSubject;
use App\Models\Student;
use App\Models\Mark;

class MarkController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where(
            'user_id',
            auth()->id()
        )->firstOrFail();

        $assignments = TeacherSubject::with([
            'subject',
            'schoolClass',
            'section'
        ])
        ->where('teacher_id',$teacher->id)
        ->get();

        $students = collect();

        if($assignments->count()){

            $students = Student::where(function($query) use($assignments){

                foreach($assignments as $assignment){

                    $query->orWhere(function($q) use($assignment){

                        $q->where('class_id',$assignment->school_class_id)
                          ->where('section_id',$assignment->section_id);

                    });

                }

            })->get();

        }

        return view(
            'teacher.marks.index',
            compact(
                'students',
                'assignments'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'subject_id'=>'required',

            'marks'=>'required|array'

        ]);


        foreach ($request->marks as $studentId => $obtainedMarks) {

    if ($obtainedMarks > $request->total_marks) {

        return back()

            ->withInput()

            ->withErrors([

                'marks' => 'Obtained Marks cannot be greater than Total Marks.'

            ]);

    }

}
        foreach ($request->marks as $studentId => $obtained) {

    Mark::updateOrCreate(

        [
            'student_id' => $studentId,
            'subject_id' => $request->subject_id,
        ],

        [
            'total_marks'    => $request->total_marks,
            'obtained_marks' => $obtained,
        ]

    );
}

        return back()->with(
            'success',
            'Marks Saved Successfully'
        );
    }

    public function view(Request $request)
{
    $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

    $assignments = TeacherSubject::with('subject')
        ->where('teacher_id', $teacher->id)
        ->get();

    $subjectIds = $assignments->pluck('subject_id');

    $query = Mark::with([
        'student.schoolClass',
        'student.section',
        'subject'
    ])->whereIn('subject_id', $subjectIds);

    if ($request->filled('subject_id')) {

        $query->where('subject_id', $request->subject_id);

    }

    if ($request->filled('search')) {

        $query->whereHas('student', function ($q) use ($request) {

            $q->where('name', 'like', '%' . $request->search . '%');

        });

    }

    $marks = $query->latest()->paginate(10);

    return view(
        'teacher.marks.view',
        compact(
            'marks',
            'assignments'
        )
    );
}

public function edit(Mark $mark)
{
    return view(
        'teacher.marks.edit',
        compact('mark')
    );
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

    $mark->update([
    'obtained_marks' => $request->obtained_marks,
    'total_marks' => $request->total_marks,

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
}