<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $posts = Post::with('comments', 'category', 'tags')->get();
        $recentPosts = Post::latest()->take(3)->get();

        return view('index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
        ]);
    }

    public function blog()
    {
        $posts = Post::with('comments')->latest()->simplePaginate(4);
        $users = User::all();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('blog', [
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required', 'min:50', 'max:250'],
            'body' => ['required', 'min:100', 'max:5000'],
            'image' => ['required', File::types(['png', 'jpg', 'webp'])],
            'category_id' => ['required', 'exists:categories,id'],
            'read_time' => ['required'],
            'tags' => ['nullable', 'string', 'max:255']
        ]);

        $path = Storage::disk('public')->put('post_images', $request->image);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => Purifier::clean($request->body),
            'category_id' => $request->category_id,
            'date' => date('M d, Y'),
            'read_time' => $request->read_time,
            'image' => Storage::url($path),
            'tags' => $request->tags,
        ]);

        if ($request->tags) {
            foreach (explode(',', $request->tags) as $tag) {
                $post->tag(strtolower($tag));
            }
        }

        return redirect('/blog')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();
        $postTags = $post->tags;
        $tags = explode(",", $postTags);
        // Append "#" to each element
        $tagsArray = array();
        if (!empty($postTags)) {
            foreach ($tags as $tag) {
                $tagsArray[$tag] = "#" . strtolower($tag);
            }
        }

        $postKey = 'post_' . $post->id;
        if (!session()->has($postKey)) {
            $post->increment('views');
            session()->put($postKey, 1);
        }

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'tags' => $tagsArray,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $request->validate([
            'title' => ['required'],
            'subtitle' => ['required', 'min:50', 'max:250'],
            'body' => ['required', 'min:100', 'max:5000'],
            'image' => [File::types(['png', 'jpg', 'webp'])],
            'category_id' => ['required', 'exists:categories,id'],
            'read_time' => ['required'],
            'tags' => ['nullable', 'string', 'max:255']
        ]);

        $post->update([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => Purifier::clean($request->body),
            'category_id' => $request->category_id,
            'date' => date('M d, Y') . ' (edited)',
            'read_time' => $request->read_time,
            'image' => 'https://picsum.photos/300/300',
            'tags' => $request->tags,
        ]);

        if ($request->tags) {
            foreach (explode(',', $request->tags) as $tag) {
                $post->tag(strtolower($tag));
            }
        }

        return redirect('/posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog');
    }
}
