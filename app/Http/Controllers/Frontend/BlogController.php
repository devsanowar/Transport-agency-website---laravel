<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])->latest()->paginate(8);
        $recentPosts = Post::latest()->take(3)->get();
        $postCategories = PostCategory::latest()->withCount('posts')->get();
        $categoryPosts = PostCategory::with('posts')->latest()->get();
        return view('website.blog-page', compact('posts', 'recentPosts', 'postCategories', 'categoryPosts'));
    }

    public function categoryPosts(Request $request, $slug = null)
    {
        // Sidebar data
        $postCategories = PostCategory::latest()->withCount('posts')->get();
        $recentPosts = Post::latest()->take(3)->get();

        // Filter by category if slug exists
        if ($slug) {
            $category = PostCategory::where('post_category_slug', $slug)->firstOrFail();
            $posts = $category->posts()->with(['category', 'author'])->latest()->paginate(8);
            return view('website.blog-page', compact('posts', 'recentPosts', 'postCategories', 'category'));
        }

        // Default: all posts
        $posts = Post::with(['category', 'author'])->latest()->paginate(8);

        return view('website.blog-page', compact('posts', 'recentPosts', 'postCategories'));
    }



    public function details($slug)
    {
        $recentPosts = Post::latest()->take(3)->get();
        $postCategories = PostCategory::latest()->withCount('posts')->get();
        $postDetail = Post::with(['category', 'author'])->where('slug', $slug)->first();
        return view('website.layouts.pages.blog-page.blog_details', compact('postDetail', 'recentPosts', 'postCategories'));
    }
}
