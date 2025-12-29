<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;

class PostCRUDL extends Controller
{
    public function index()
    {

        $posts = Post::with('user')->latest()->simplePaginate(3);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // authorize

        // validate
        $credentials = request()->validate([
            'content' => ['required', 'min:10', 'max:1000'],
            
        ]);
        $credentials['user_id'] = Auth::id();
        // store
        Post::create($credentials);
        // return redirect ('/posts');
        return redirect('/profile')->with('success', 'you have successfully created a new post');
    }

    public function edit(Post $post)
    {

        return view('posts.edit', [
            'post' => $post
        ]);
    
    }

    public function update(Post $post)
    {
        // authorize
        // validate
        $credentials = request()->validate([
            'content' => ['required', 'min:10', 'max:1000']
        ]);

        // update
        $post->update($credentials);
        // redirect to the post
        return redirect('/posts/'. $post->id)->with('success', 'you have successfully updated your post');
    }

    public function destroy(Post $post)
    {
        // authorize
        // delete
        $post->delete();
        // redirect

        return redirect('/posts')->with('success', 'you have successfully deleted a post');
    }
}
