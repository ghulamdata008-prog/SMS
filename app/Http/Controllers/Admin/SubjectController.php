<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\SchoolClass;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('schoolClass')
                    ->latest()
                    ->paginate(10);

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $classes = SchoolClass::all();

        return view('admin.subjects.create', compact('classes'));
    }

    public function store(StoreSubjectRequest $request)
    {
        Subject::create($request->all());

        return redirect()
            ->route('admin.subjects.index')
            ->with('success','Subject Added Successfully.');
    }

    public function show(Subject $subject)
    {
        $subject->load('schoolClass');

        return view('admin.subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $classes = SchoolClass::all();

        return view('admin.subjects.edit', compact('subject','classes'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->all());

        return redirect()
            ->route('admin.subjects.index')
            ->with('success','Subject Updated Successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()
            ->route('admin.subjects.index')
            ->with('success','Subject Deleted Successfully.');
    }
}