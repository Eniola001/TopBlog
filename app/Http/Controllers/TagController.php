<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag = Tag::where('name', $tag->name)->firstOrFail();
        return view('tags', ['posts' => $tag->posts, 'tag' => $tag->name]);
    }
}
