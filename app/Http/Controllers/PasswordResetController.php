<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function request()
    {
        return view('auth.forgot-password');
    }

    public function email()
    {

        // validate
        request()->validate([
            'email' => ['required', 'email']
        ]);

        // send link 
        $status = Password::sendResetLink(
            request()->only('email')
        );

        // check if the email was sent successfully and redirect back with or without errors
        return $status === Password::RESET_LINK_SENT ?
        back()->with(['status' => __($status)]) :
        back()->withErrors(['email' => __($status)]);
    }

    public function reset(string $token)
    {
        return view('auth.reset-password', [
            'token' => $token
        ]);
    }

    public function update()
    {
        // validate
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'token' => ['required']
        ]);

        // forcefully update the password regardless whether or not the fillable fields allow it. 
        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password){
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

            }
        );

        // check if it was updated successfully and redirect back with or without errors
        return $status === Password::PASSWORD_RESET ?
        redirect('/reset-password-message')->with(['success' => __($status)]) :
        back()->withErrors(['email' => __($status)]);

    }
}
