<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user')->with('comments')->get();
        return $posts;
        // return view('posts.index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Posts::create([
            'user_id' => auth()->user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('body'),
        ]);

        

        return redirect('/home')->with('success', 'Post created successfully!');

       
    }
}