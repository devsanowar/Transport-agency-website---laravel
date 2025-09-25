<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Cta;
use App\Models\CustomerReview;
use App\Models\Feature;
use App\Models\HomeAbout;
use App\Models\Post;
use App\Models\ReviewSectionTitle;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

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
        $posts = Post::with(['category','author'])->latest()->get();

        return view('website.home', compact('sliders', 'features', 'about', 'services', 'achievements', 'cta', 'reviews','reviewTitle', 'teams', 'posts'));
    }
}
