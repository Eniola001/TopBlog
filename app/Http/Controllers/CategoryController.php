<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $category = Category::with('posts')->findOrFail($category->id);
        return view('categories', ['category' => $category->name, 'posts' => $category->posts]);
    }
}
