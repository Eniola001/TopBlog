<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'author' => ['required', 'string', 'max:50'],
            'comment' => ['required', 'string'],
        ]);

        $post->comments()->create($request->all());

        return redirect('/posts/' . $post->id . '#comments');
    }
}
