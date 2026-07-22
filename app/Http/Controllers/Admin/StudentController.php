<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\StudentAddedNotification;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display all students
     */
    public function index(Request $request)
    {
        $students = Student::latest()->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show create form
     */
    public function create()
{
    $classes = SchoolClass::all();

    return view('admin.students.create', compact('classes'));
}

    /**
     * Store student
     */
   public function store(Request $request)
{

$request->validate([
    'name'=>'required|string|max:255',
    'email'=>'required|email|unique:users,email',
    'password'=>'required|min:8',
    'phone'=>'nullable|string|max:20',
    'class_id'=>'required|exists:school_classes,id',
    'section_id'=>'required|exists:sections,id',
    'address'=>'nullable|string',
    'profile_image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);


$image = null;

if($request->hasFile('profile_image')){
    $image = $request->file('profile_image')
        ->store('students','public');
}


// create user
$user = User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password),
]);


// assign student role
$user->assignRole('student');


// create student
$student = Student::create([
    'user_id'=>$user->id,
    'name'=>$request->name,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'class_id'=>$request->class_id,
    'section_id'=>$request->section_id,
    'address'=>$request->address,
    'profile_image'=>$image,
]);

$admins = User::role('admin')->get();


foreach($admins as $admin){

    $admin->notify(
        new StudentAddedNotification($student)
    );

}
return redirect()
->route('admin.students.index')
->with('success','Student Added Successfully.');

}
    /**
     * Show student
     */
    public function show(Student $student)
{
    $student->load('schoolClass');
    return view('admin.students.show', compact('student'));
}

    /**
     * Edit student
     */
    public function edit(Student $student)
{
    $classes = SchoolClass::all();

    return view('admin.students.edit', compact('student', 'classes'));
}

    /**
     * Update student
     */
    public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'nullable|string|max:20',
        'class_id' => 'required|exists:school_classes,id',
        'section_id' => 'required|exists:sections,id',
        'address' => 'nullable|string',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $image = $student->profile_image;

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image')
            ->store('students', 'public');
    }

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'class_id' => $request->class_id,
        'section_id' => $request->section_id,
        'address' => $request->address,
        'profile_image' => $image,
    ]);

    return redirect()
        ->route('admin.students.index')
        ->with('success', 'Student Updated Successfully.');
}

    /**
     * Delete student
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function getSections($classId)
{
    return Section::where('class_id',$classId)->get();
}
}