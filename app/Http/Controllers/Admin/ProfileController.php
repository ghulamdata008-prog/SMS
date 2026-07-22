<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show Profile
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Edit Profile
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update Profile
     */
    public function update(Request $request)
{
    dd($request->all(), $request->file('profile_photo'));
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:500',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'current_password' => 'nullable|required_with:password',
        'password' => 'nullable|min:8|confirmed',
    ]);

    $user = Auth::user();

    if ($request->hasFile('profile_photo')) {

        if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->profile_photo = $request->file('profile_photo')
            ->store('profile', 'public');
    }

    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->address = $request->address;

    // Change password only if a new password was entered
    if ($request->filled('password')) {

        if (!Hash::check($request->current_password, $user->password)) {

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.'
            ]);
        }

        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()
        ->route('admin.profile')
        ->with('success', 'Profile Updated Successfully.');
}
    /**
     * Change Password Page
     */
    public function password()
    {
        return view('admin.profile.password');
    }

    /**
     * Update Password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Password Updated Successfully.');
    }
}