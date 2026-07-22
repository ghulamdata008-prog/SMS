<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Models\Teacher;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\TeacherSubject;
use App\Models\TeacherClass;
use App\Models\TeacherAssignment;

use Illuminate\Http\Request;



class TeacherAssignmentController extends Controller
{


    public function index()
    {


        $assignments = TeacherSubject::with([

            'teacher',
            'subject',
            'schoolClass',
            'section',

        ])
        ->latest()
        ->get();



        return view(
            'admin.teacher-assignment.index',
            compact('assignments')
        );


    }





    public function create()
    {


        $teachers = Teacher::all();


        $subjects = Subject::all();


        $classes = SchoolClass::all();


        $sections = Section::all();



        return view(
            'admin.teacher-assignment.create',
            compact(
                'teachers',
                'subjects',
                'classes',
                'sections'
            )
        );


    }





    public function store(Request $request)
{

    $request->validate([

        'teacher_id'=>'required',
        'subject_id'=>'required',
        'school_class_id'=>'required',
        'section_id'=>'required'

    ],[

        'teacher_id.required'=>'Please select teacher',
        'subject_id.required'=>'Please select subject',
        'school_class_id.required'=>'Please select class',
        'section_id.required'=>'Please select section',

    ]);



    TeacherSubject::create([

        'teacher_id'=>$request->teacher_id,
        'subject_id'=>$request->subject_id,
        'school_class_id'=>$request->school_class_id,
        'section_id'=>$request->section_id

    ]);


    return redirect()

    ->route('admin.teacher.assignment.index')

    ->with(
        'success',
        'Teacher Assigned Successfully'
    );

}


    public function destroy($id)
    {


        $assignment = TeacherSubject::findOrFail($id);



        $assignment->delete();



        return back()

        ->with(
            'success',
            'Assignment Deleted Successfully'
        );


    }


}