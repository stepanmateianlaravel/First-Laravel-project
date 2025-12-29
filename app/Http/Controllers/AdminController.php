<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

use function Symfony\Component\Clock\now;

class AdminController extends Controller
{
    public function index()
    {
        $users  = User::latest()->paginate(3);
        return view('admin.users-table', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {

        // can't edit itself if he is an admin
              if (FacadesAuth::user()->id === $user->id) {
        return back()->with('error', 'You are not allowed to edit yourself.');
    }
        return view('admin.user-edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        // authorize (has to be an admin and can't edit itself)
    if (FacadesAuth::user()->id === $user->id) {
        return back()->with('error', 'Suicide prevention: you are not allowed to delete yourself.');
    }
        // validate
        request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'admin' => ['required'],
        ]);
        // update
        $user->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'admin' => request('admin')
        ]);

        if(request()->has('verified')){
            if(is_null($user->email_verified_at)){
                $user->email_verified_at = now();
            }
        }else{
            $user->email_verified_at = null;
        }

        $user->save();
        // redirect

        return redirect('/admin')->with('success', 'you have successfully updated a user');

        
    }

    public function create()
    {
        return view('admin.user-create');
    }

    public function store()
    {
        
        // authorize (has to be admin)
        // validate
        request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,except,id'],
            'password' => ['required', 'min:8'],
            'admin' => ['required'],
        ]);
        // store the user in the db
        User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => request('password'),
            'admin' => request('admin'),
            'email_verified_at' => request()->has('verified') ? now() : null
        ]);
        // redirect
        return redirect('/admin')->with('success', 'you have successfully created a user');
    }

    public function destroy(User $user)
    {
        // authorize (has to be an admin and it can't delete itself)
      if (FacadesAuth::user()->id === $user->id) {
        return back()->with('error', 'Suicide prevention: you are not allowed to delete yourself.');
    }
        // delete the user
        $user->delete();
        // redirect
        return redirect('/admin')->with('success', 'you have successfully deleted a user');
    }
    
}
