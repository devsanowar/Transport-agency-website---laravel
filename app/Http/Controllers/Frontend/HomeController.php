<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cta;
use App\Models\Post;
use App\Models\Team;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Service;
use App\Models\HomeAbout;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Models\ReviewSectionTitle;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->orderByDesc('id')->get();
        $features = Feature::where('status', 1)->orderBy('order_by')->get();
        $about = HomeAbout::first();
        $services = Service::where('status', 1)->get();
        $achievements = Achievement::where('status', 1)
                    ->orderBy('order_by')
                    ->get();

        $cta = Cta::first();
        $reviews = CustomerReview::where('status', 1)->latest()->get();
        $reviewTitle = ReviewSectionTitle::first();

        $teams = Team::all();
        $posts = Post::with(['category','author'])->latest()->take(3)->get();

        $brands = Brand::where('status', 1)->orderBy('id','desc')->get();

        return view('website.home', compact('sliders', 'features', 'about', 'services', 'achievements', 'cta', 'reviews','reviewTitle', 'teams', 'posts', 'brands'));
    }
}
