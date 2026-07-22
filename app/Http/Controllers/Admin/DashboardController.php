<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\Subject;
 use App\Models\Student;
class DashboardController extends Controller
{
   public function index()
    {

        $students = Student::count();

        $teachers = Teacher::count();

        $classes = SchoolClass::count();

        $subjects = Subject::count();


        $recentStudents = Student::with([
        'schoolClass',
        'section'
    ])
    ->latest()
    ->take(5)
    ->get();

        // Recent Teachers
        $recentTeachers = Teacher::with([
    'assignments.subject'
])
->latest()
->take(5)
->get();

        return view('admin.dashboard', compact(

    'students',
    'teachers',
    'classes',
    'subjects',
    'recentStudents',
    'recentTeachers'

));
    }

}