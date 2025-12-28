<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store()
    {
        // authorize
        // validate
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // attempt login
        if(! Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email' => "those credentials don't match"
            ]);
        }
        // regenerate session
        request()->session()->regenerate();
        // redirect to user panel
        return redirect('/profile');
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();

        return redirect('/login');
    }
}
