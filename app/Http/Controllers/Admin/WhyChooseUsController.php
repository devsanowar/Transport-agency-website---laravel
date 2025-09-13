<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $why = WhyChooseUs::first() ?? new WhyChooseUs;
        return view('admin.layouts.pages.about-page.whyc-choose-us.index', compact('why'));
    }

    public function update(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'why_choose_us_title' => 'required|string|max:255',
            'why_choose_us_subtitle' => 'nullable|string|max:255',
            'why_choose_us_description' => 'nullable|string',
            'why_choose_us_button_text' => 'nullable|string|max:255',
            'why_choose_us_button_link' => 'nullable|string|max:255',
            'why_choose_us_bg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'why_choose_us_shape_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'why_choose_us_truck_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $why = WhyChooseUs::first() ?? new WhyChooseUs;

        // Image Upload Handler
        $uploadImage = function ($fieldName) use ($request, $why) {
            if ($request->hasFile($fieldName)) {
                // Delete old image if exists
                if ($why->$fieldName && file_exists(public_path($why->$fieldName))) {
                    unlink(public_path($why->$fieldName));
                }

                $file = $request->file($fieldName);
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/why_choose_us/' . $fileName;
                $file->move(public_path('uploads/why_choose_us'), $fileName);

                return $filePath;
            }

            return $why->$fieldName;
        };

        // Fillable fields
        $fillableFields = [
            'why_choose_us_title',
            'why_choose_us_subtitle',
            'why_choose_us_description',
            'why_choose_us_button_text',
            'why_choose_us_button_link',
        ];

        foreach ($fillableFields as $field) {
            $why->$field = $validated[$field] ?? $why->$field;
        }

        // Handle Images
        foreach (['why_choose_us_bg_image', 'why_choose_us_shape_image', 'why_choose_us_truck_image'] as $imageField) {
            $why->$imageField = $uploadImage($imageField);
        }

        $why->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Why Choose Us section updated successfully!',
            'images' => [
                'why_choose_us_bg_image' => $why->why_choose_us_bg_image ? asset($why->why_choose_us_bg_image) : null,
                'why_choose_us_shape_image' => $why->why_choose_us_shape_image ? asset($why->why_choose_us_shape_image) : null,
                'why_choose_us_truck_image' => $why->why_choose_us_truck_image ? asset($why->why_choose_us_truck_image) : null,
            ],
            'data' => $why
        ]);
    }
}
