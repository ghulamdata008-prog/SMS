<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('user', 'subjects')
            ->latest()
            ->paginate(10);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
       
        $subjects = Subject::all();

        return view('admin.teachers.create', compact('subjects'));
    }

    public function store(StoreTeacherRequest $request)
    {
        
        DB::transaction(function () use ($request) {

$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'teacher',
]);

            $user->assignRole('teacher');

$teacher = Teacher::create([
    'user_id'       => $user->id,
    'phone'         => $request->phone,
    'qualification' => $request->qualification,
    'address'       => $request->address,
    'salary'        => $request->salary,
]);
            $teacher->subjects()->sync($request->subjects);
        });

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher Added Successfully.');
    }

    public function show(Teacher $teacher)
    {
        $teacher->load('user', 'subjects');

        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $teacher->load('user', 'subjects');

        $subjects = Subject::all();

        return view('admin.teachers.edit', compact('teacher', 'subjects'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        DB::transaction(function () use ($request, $teacher) {
$teacher->user->update([
    'name' => $request->name,
    'email' => $request->email,
]);

           $teacher->update([
    'phone'         => $request->phone,
    'qualification' => $request->qualification,
    'address'       => $request->address,
    'salary'        => $request->salary,
]);

            if ($request->filled('password')) {

                $teacher->user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $teacher->update([
                'salary' => $request->salary,
            ]);

            $teacher->subjects()->sync($request->subjects);
        });

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher Updated Successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->subjects()->detach();

        $teacher->user->delete();

        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Teacher Deleted Successfully.');
    }
}