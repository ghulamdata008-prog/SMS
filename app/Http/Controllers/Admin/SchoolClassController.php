<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $classes = SchoolClass::with('sections')->latest()->get();

    return view('admin.classes.index', compact('classes'));
}
public function show(\App\Models\SchoolClass $class)
{
    return view('admin.classes.show', compact('class'));
}
public function create()
{
    return view('admin.classes.create');
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:school_classes,name',
    ]);

    SchoolClass::create([
        'name' => $request->name,
    ]);

    return redirect()
        ->route('admin.classes.index')
        ->with('success', 'Class Added Successfully');
}

    // $request->validate([
    //     'name'=>'required',
    //     'section_id'=>'required',
    // ]);


    

    

public function edit(SchoolClass $class)
{
    $sections = Section::all();

    return view('admin.classes.edit', compact('class', 'sections'));
}

public function update(Request $request, SchoolClass $class)
{
    $request->validate([
        'name'=>'required',
        
    ]);

    $class->update($request->all());

    return redirect()
        ->route('admin.classes.index')
        ->with('success','Class Updated');
}

public function destroy(SchoolClass $class)
{
    $class->delete();

    return back()->with('success','Class Deleted');
}
}
