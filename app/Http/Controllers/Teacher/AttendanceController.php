<?php

namespace App\Http\Controllers\Teacher;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

        $assignments = TeacherSubject::with([
            'schoolClass',
            'section'
        ])
        ->where('teacher_id', $teacher->id)
        ->get();

        $students = collect();

        if ($assignments->count()) {

            $students = Student::with([
                'schoolClass',
                'section'
            ])
            ->where(function ($query) use ($assignments) {

                foreach ($assignments as $assignment) {

                    $query->orWhere(function ($q) use ($assignment) {

                        $q->where('class_id', $assignment->school_class_id)
                          ->where('section_id', $assignment->section_id);

                    });

                }

            })
            ->get();

        }

        return view(
            'teacher.attendance.index',
            compact(
                'students',
                'assignments'
            )
        );
    }
    public function store(Request $request)
{
     
    $request->validate([
        'attendance_date' => 'required|date',
        'attendance' => 'required|array',
    ]);

    $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

    foreach ($request->attendance as $studentId => $status) {

        Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'attendance_date' => $request->attendance_date,
            ],
            [
                'teacher_id' => $teacher->id,
                'status' => $status,
            ]
        );
    }

    return back()->with('success', 'Attendance Saved Successfully');
}

public function view(Request $request)
{
    $teacher = Teacher::where('user_id', auth()->id())->firstOrFail();

    $query = Attendance::with([
        'student.schoolClass',
        'student.section'
    ])
    ->where('teacher_id', $teacher->id);

    if ($request->filled('date')) {
        $query->whereDate('attendance_date', $request->date);
    }

    if ($request->filled('class_id')) {
        $query->whereHas('student', function ($q) use ($request) {
            $q->where('class_id', $request->class_id);
        });
    }

    if ($request->filled('section_id')) {
        $query->whereHas('student', function ($q) use ($request) {
            $q->where('section_id', $request->section_id);
        });
    }

    if ($request->filled('search')) {

        $query->whereHas('student', function ($q) use ($request) {

            $q->where('name', 'like', '%' . $request->search . '%');

        });

    }

    $attendances = $query
        ->latest('attendance_date')
        ->paginate(10);

    $present = (clone $query)->where('status', 'Present')->count();
    $absent  = (clone $query)->where('status', 'Absent')->count();
    $leave   = (clone $query)->where('status', 'Leave')->count();

    $assignments = TeacherSubject::with([
        'schoolClass',
        'section'
    ])
    ->where('teacher_id', $teacher->id)
    ->get();

    return view(
        'teacher.attendance.view',
        compact(
            'attendances',
            'assignments',
            'present',
            'absent',
            'leave'
        )
    );
}
}