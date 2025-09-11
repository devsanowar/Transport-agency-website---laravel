<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAboutController extends Controller
{
    public function index()
    {
        $about = HomeAbout::first();
        if (!$about) {
            $about = new HomeAbout();
        }
        return view('admin.layouts.pages.home-page.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'tagline' => 'nullable|string|max:255',
            'title_main' => 'nullable|string',
            'title_highlight' => 'nullable|string',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',
            'counter_number' => 'nullable|integer',
            'counter_label' => 'nullable|string|max:255',
            'progress_one_title' => 'nullable|string|max:255',
            'progress_one_value' => 'nullable|integer',
            'progress_two_title' => 'nullable|string|max:255',
            'progress_two_value' => 'nullable|integer',
            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'point_four' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'author_name' => 'nullable|string|max:255',
            'author_designation' => 'nullable|string|max:255',
            'video_link' => 'nullable|string|max:255',
            'image_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $about = HomeAbout::first() ?? new HomeAbout();


        $uploadImage = function ($fieldName) use ($request, $about) {
            if ($request->hasFile($fieldName)) {
                if ($about->$fieldName && file_exists(public_path($about->$fieldName))) {
                    unlink(public_path($about->$fieldName));
                }

                $file = $request->file($fieldName);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/about_image/' . $fileName;
                $file->move(public_path('uploads/about_image'), $fileName);

                return $filePath;
            }
            return $about->$fieldName;
        };


        $fillableFields = [
            'tagline',
            'title_main',
            'title_highlight',
            'description_one',
            'description_two',
            'counter_number',
            'counter_label',
            'progress_one_title',
            'progress_one_value',
            'progress_two_title',
            'progress_two_value',
            'point_one',
            'point_two',
            'point_three',
            'point_four',
            'button_text',
            'button_link',
            'author_name',
            'author_designation',
            'video_link'
        ];

        foreach ($fillableFields as $field) {
            $about->$field = $validated[$field] ?? $about->$field;
        }

        foreach (['image_one', 'image_two', 'author_image'] as $imageField) {
            $about->$imageField = $uploadImage($imageField);
        }

        $about->save();

        return response()->json([
            'status' => 'success',
            'message' => $about->wasRecentlyCreated ? 'Home About created successfully!' : 'Home About updated successfully!',
            'images' => [
                'image_one' => $about->image_one ? asset($about->image_one) : null,
                'image_two' => $about->image_two ? asset($about->image_two) : null,
                'author_image' => $about->author_image ? asset($about->author_image) : null,
            ],
            'data' => $about
        ]);
    }
}
