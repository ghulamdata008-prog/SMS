<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('teacher.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($request->only('email','password')))
        {
            if(auth()->user()->hasRole('teacher'))
            {
                $request->session()->regenerate();

                return redirect()->route('teacher.dashboard');
            }

            Auth::logout();
        }

        return back()->with('error','Invalid Teacher Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('teacher.login');
    }
}