<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;


class MarkController extends Controller
{


    // View All Marks

    public function index()
    {

        $marks = Mark::with([
            'student',
            'subject'
        ])
        ->latest()
        ->get();



        return view(
            'admin.marks.index',
            compact('marks')
        );

    }




    // Edit Marks Page

    public function edit(Mark $mark)
    {

        return view(
            'admin.marks.edit',
            compact('mark')
        );

    }




    // Update Marks

    public function update(Request $request, Mark $mark)
    {


       $request->validate([
    'total_marks' => 'required|integer|min:1',
    'obtained_marks' => 'required|integer|min:0',
]);

if ($request->obtained_marks > $request->total_marks) {
    return back()
        ->withErrors([
            'obtained_marks' => 'Obtained Marks cannot be greater than Total Marks.'
        ])
        ->withInput();
}

$mark->update([
    'total_marks' => $request->total_marks,
    'obtained_marks' => $request->obtained_marks,
]);



        return redirect()

        ->route('admin.marks.index')

        ->with(
            'success',
            'Marks Updated Successfully'
        );


    }




    // Delete Marks

    public function destroy(Mark $mark)
    {


        $mark->delete();


        return back()

        ->with(
            'success',
            'Marks Deleted Successfully'
        );


    }




    // Student Result Card

    public function result($student)
    {


        $student = Student::with([
            'marks.subject'
        ])
        ->findOrFail($student);



        return view(
            'admin.marks.result',
            compact('student')
        );


    }


}