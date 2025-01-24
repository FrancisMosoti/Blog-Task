<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'content' => 'required',
        ]);

        $comment = Comments::create([
            
            'posts_id' => $request->input('post_id'),
            'user_id' => auth()->user()->id,
            'content' => $request->get('content'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}