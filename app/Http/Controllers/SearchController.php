<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the search query to ensure it's not empty
        $request->validate([
            'search' => ['required', 'string', 'min:1'],
        ]);

        $posts = Post::with(['user', 'comments', 'tags'])->where('title', 'LIKE', '%' . request('search') . '%')->get();
        $search = $request->input('search');
        return view('search', ['posts' => $posts, 'search' => $search]);
    }
}
