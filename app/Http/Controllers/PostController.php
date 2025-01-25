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
        
    }
    public function show($id)
    {
        $posts = Posts::where('user_id', $id)->with('comments.user')->get();
        
        return $posts;
        
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