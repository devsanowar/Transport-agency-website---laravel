<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageAbout;
use Illuminate\Http\Request;

class AboutPageAboutController extends Controller
{
    public function index(){
        $about = AboutPageAbout::first() ?? new AboutPageAbout;
        return view('admin.layouts.pages.about-page.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'about_tag_line' => 'nullable|string|max:255',
            'about_section_title' => 'required|string|max:255',
            'about_section_highlight_title' => 'nullable|string|max:255',
            'about_description' => 'required|string',
            'about_founder_name' => 'nullable|string|max:255',
            'about_founder_designation' => 'nullable|string|max:255',
            'about_founder_founder_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_imageTwo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = AboutPageAbout::first() ?? new AboutPageAbout;

        // Image Upload Handler
        $uploadImage = function ($fieldName) use ($request, $about) {
            if ($request->hasFile($fieldName)) {
                if ($about->$fieldName && file_exists(public_path($about->$fieldName))) {
                    unlink(public_path($about->$fieldName));
                }

                $file = $request->file($fieldName);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/about/' . $fileName;
                $file->move(public_path('uploads/about'), $fileName);

                return $filePath;
            }
            return $about->$fieldName;
        };

        // Fillable fields
        $fillableFields = [
            'about_tag_line',
            'about_section_title',
            'about_section_highlight_title',
            'about_description',
            'about_founder_name',
            'about_founder_designation',
        ];

        foreach ($fillableFields as $field) {
            $about->$field = $validated[$field] ?? $about->$field;
        }

        // Handle Images
        foreach (['about_founder_founder_image', 'about_image', 'about_imageTwo'] as $imageField) {
            $about->$imageField = $uploadImage($imageField);
        }

        $about->save();

        return response()->json([
            'status' => 'success',
            'message' => 'About section updated successfully!',
            'images' => [
                'about_founder_founder_image' => $about->about_founder_founder_image ? asset($about->about_founder_founder_image) : null,
                'about_image' => $about->about_image ? asset($about->about_image) : null,
                'about_imageTwo' => $about->about_imageTwo ? asset($about->about_imageTwo) : null,
            ],
            'data' => $about
        ]);
    }
}
