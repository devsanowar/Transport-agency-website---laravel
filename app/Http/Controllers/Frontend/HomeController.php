<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->orderByDesc('id')->get();
        $features = Feature::where('status', 1)->orderBy('order_by')->get();
        return view('website.home', compact('sliders', 'features'));
    }
}
