<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HomeContactSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HomeContactController extends Controller
{
    public function index()
    {
        $section = HomeContactSection::first() ?? new HomeContactSection;

        return view('admin.layouts.pages.home-page.contact.index', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'nullable|string|max:20',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'background_shape_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);


        $section = HomeContactSection::first() ?? new HomeContactSection();

        $section->background_color = $request->background_color;

        if ($request->hasFile('background_image')) {
            if ($section->background_image && file_exists(public_path($section->background_image))) {
                unlink(public_path($section->background_image));
            }

            $file = $request->file('background_image');
            $filename = 'bg_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/contact_sections'), $filename);
            $section->background_image = 'uploads/contact_sections/' . $filename;
        }

        if ($request->hasFile('background_shape_image')) {
            if ($section->background_shape_image && file_exists(public_path($section->background_shape_image))) {
                unlink(public_path($section->background_shape_image));
            }

            $file = $request->file('background_shape_image');
            $filename = 'shape_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/contact_sections'), $filename);
            $section->background_shape_image = 'uploads/contact_sections/' . $filename;
        }

        $section->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Home Contact Section updated successfully!',
            'background_image' => $section->background_image ? asset($section->background_image) : null,
            'background_shape_image' => $section->background_shape_image ? asset($section->background_shape_image) : null,
        ]);
    }
}
