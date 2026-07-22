<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('schoolClass')->get();

        return view('admin.sections.index', compact('sections'));
    }

public function show(Section $section)
{
    $section->load('schoolClass');

    return view('admin.sections.show', compact('section'));
}
    public function create()
    {
        $classes = SchoolClass::all();

        return view('admin.sections.create', compact('classes'));
    }


    public function store(Request $request)
{
    $request->validate([
    'class_id' => 'required|exists:school_classes,id',
    'name' => 'required',
],[
    'class_id.required' => 'Please select a class.',
    'class_id.exists'   => 'Selected class is invalid.',
    'name.required'     => 'Please enter section name.',
]);

    Section::create([
        'class_id' => $request->class_id,
        'name' => $request->name,
    ]);

    return redirect()
        ->route('admin.sections.index')
        ->with('success', 'Section Created Successfully');
}


    public function edit(Section $section)
    {
        $classes = SchoolClass::all();

        return view('admin.sections.edit',
        compact('section','classes'));
    }



    public function update(Request $request, Section $section)
    {

        $request->validate([
    'class_id' => 'required|exists:school_classes,id',
    'name' => 'required',
],[
    'class_id.required' => 'Please select a class.',
    'class_id.exists'   => 'Selected class is invalid.',
    'name.required'     => 'Please enter section name.',
]);


        $section->update([
            'class_id'=>$request->class_id,
            'name'=>$request->name
        ]);


        return redirect()
        ->route('admin.sections.index')
        ->with('success','Section Updated Successfully');

    }



    public function destroy(Section $section)
    {
        $section->delete();


        return redirect()
        ->route('admin.sections.index')
        ->with('success','Section Deleted Successfully');
    }
}