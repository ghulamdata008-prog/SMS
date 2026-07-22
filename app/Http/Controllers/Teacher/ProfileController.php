<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $teacher = Teacher::with('user')
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('teacher.profile.index', compact('teacher'));
    }

    public function update(Request $request)
    {
        $teacher = Teacher::with('user')
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$teacher->user->id,
            'phone'=>'nullable',
            'qualification'=>'nullable',
            'address'=>'nullable',
            'profile_image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $teacher->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        $image = $teacher->user->profile_photo;

        if($request->hasFile('profile_image')){

            $image = $request->file('profile_image')
                ->store('teachers','public');

        }

        $teacher->user->update([
            'profile_photo'=>$image,
        ]);

        $teacher->update([
            'phone'=>$request->phone,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
        ]);

        return back()->with(
            'success',
            'Profile Updated Successfully.'
        );
    }

    public function password(Request $request)
    {
        $request->validate([

            'password'=>'required|min:8|confirmed'

        ]);

        auth()->user()->update([

            'password'=>Hash::make($request->password)

        ]);

        return back()->with(
            'success',
            'Password Updated Successfully.'
        );
    }

    public function show()
{
    $teacher = Teacher::with('user')
        ->where('user_id', auth()->id())
        ->firstOrFail();

    return view(
        'teacher.profile.show',
        compact('teacher')
    );
}
}