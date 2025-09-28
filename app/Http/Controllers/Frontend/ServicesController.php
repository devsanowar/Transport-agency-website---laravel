<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index(){
        $services = Service::where('status', 1)->latest()->get();
        return view('website.services', compact('services'));
    }
}
