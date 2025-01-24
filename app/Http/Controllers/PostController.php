<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        return redirect('/posts')->with('success', 'Post created successfully!');

       
    }
}