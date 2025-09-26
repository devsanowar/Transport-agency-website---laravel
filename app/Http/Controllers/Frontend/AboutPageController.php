<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cta;
use App\Models\Team;
use App\Models\Brand;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Models\WhyChooseUsFeature;
use App\Http\Controllers\Controller;
use App\Models\AboutPageAbout;

class AboutPageController extends Controller
{
    public function index(){
        $brands = Brand::where('status', 1)->get();
        $cta = Cta::first();
        $teams = Team::all();
        $whyChooseUs = WhyChooseUs::with('features')->first();
        $reviews = CustomerReview::select(['id','client_image'])->take(5)->get();

        $about = AboutPageAbout::first();
        return view('website.layouts.about-page', compact('brands', 'cta', 'teams', 'whyChooseUs', 'reviews', 'about'));
    }
}
