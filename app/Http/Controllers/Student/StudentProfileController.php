<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    public function index()
    {
        $student = Student::with([
            'schoolClass',
            'section'
        ])->where('user_id', auth()->id())->firstOrFail();

        return view(
            'student.profile.index',
            compact('student')
        );
    }

    public function update(Request $request)
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:20',
            'address' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {

            if ($student->profile_image &&
                Storage::disk('public')->exists($student->profile_image)) {

                Storage::disk('public')->delete($student->profile_image);
            }

            $student->profile_image = $request
                ->file('profile_image')
                ->store('students', 'public');
        }

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->address = $request->address;

        $student->save();

        return back()->with(
            'success',
            'Profile Updated Successfully.'
        );
    }
}