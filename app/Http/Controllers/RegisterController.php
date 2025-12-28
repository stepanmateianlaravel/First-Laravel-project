<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;




class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store()
    {
        // Authorize
        // validate
        $credentials = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,except,id'],
            'password' => ['required', 'confirmed']
        ]);
        // store user
        $user = User::create($credentials);
        // Alert that a new user is being Registered
        event(new Registered($user));
        // login user
        FacadesAuth::login($user);
        // regenerate session
        request()->session()->regenerate();
        // redirect
        return redirect('/posts');
    }

}
