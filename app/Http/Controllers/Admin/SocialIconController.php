<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialIconController extends Controller
{
    public function index(){
        return view('admin.layouts.pages.social-icon.index');
    }
}
