<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::with(['category','author'])->latest()->paginate(8);
        $recentPosts = Post::latest()->take(3)->get();
        $postCategories =PostCategory::latest()->withCount('posts')->get();
        return view('website.blog-page', compact('posts','recentPosts','postCategories'));
    }
}
