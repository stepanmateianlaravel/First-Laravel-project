<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function notice()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/posts')->with('success', 'your email has been successfully verified');
    }

    public function send()
    {
        request()->user()->sendEmailVerificationNotification();

        return back()->with(['success' => 'email sent successfully']);
    }
}
