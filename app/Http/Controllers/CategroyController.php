<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategroyController extends Controller
{
    public function show(Category $category) {
        $category = $category->load('children');
        $posts = Post::where('category_id', $category->id)->paginate(1);
        return view('website.category', compact('category', 'posts'));
    }
}
