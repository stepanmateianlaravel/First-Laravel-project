<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->simplePaginate(3);
        $user = Auth::user();
        return view('auth.profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function update()
    {

        /** @var \App\Models\User $user */

        $user = Auth::user();
        // validate
        $credentials = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email']
        ]);
        // update
        $user->update($credentials);

        return redirect('/profile');

    }

    public function destroy()
    {
        /** @var \App\Models\User $user */
        
        request()->validate([
            'password' => ['required', 'current_password']
        ]);

        Auth::logout();
        $user->delete();

        return redirect('/login');
    }

    public function view()
    {
        $user = Auth::user();

        return view('auth.view-profile', [
            'user' => $user
        ]);
    }
}
