<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.layouts.pages.home-page.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.home-page.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'slider_title'       => 'required|string',
            'slider_subtitle'    => 'nullable|string|max:255',
            'slider_contents'    => 'nullable|string',
            'slider_button_name' => 'nullable|string',
            'slider_button_link' => 'nullable|string',
            'slider_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
            // 'slider_image_two'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'             => 'nullable|in:1,0',
        ]);

        // default image
        $sliderImage = 'uploads/slider_images/slider-image.jpg';

        if ($request->hasFile('slider_image')) {
            $file     = $request->file('slider_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider_images'), $fileName);
            $sliderImage = 'uploads/slider_images/' . $fileName; // database path
        }

        // $sliderImageTwo = null;
        // if ($request->hasFile('slider_image_two')) {
        //     $file     = $request->file('slider_image_two');
        //     $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('uploads/slider_images'), $fileName);
        //     $sliderImageTwo = 'uploads/slider_images/' . $fileName; // database path
        // }

        $slider = Slider::create([
            'slider_title'       => $request->slider_title,
            'slider_subtitle'    => $request->slider_subtitle,
            'slider_contents'    => $request->slider_contents,
            'slider_button_name' => $request->slider_button_name,
            'slider_button_link' => $request->slider_button_link,
            'slider_image'       => $sliderImage,
            // 'slider_image_two'   => $sliderImageTwo,
            'status'             => $request->status ?? 1,
        ]);

        // SEO (optional)
        $slider->seo()->create([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Slider created successfully.',
            'data'    => $slider,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.layouts.pages.home-page.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'slider_title'       => 'required|string',
            'slider_subtitle'    => 'nullable|string|max:255',
            'slider_contents'    => 'nullable|string',
            'slider_button_name' => 'nullable|string',
            'slider_button_link' => 'nullable|string',
            'slider_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'status'             => 'nullable|in:0,1',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string',
            'meta_description'   => 'nullable|string',
        ]);

        // Image update logic
        $sliderImage = $slider->slider_image; // পুরনো image রাখছি default হিসেবে

        if ($request->hasFile('slider_image')) {
            // পুরনো image ডিলিট করবো যদি থাকে
            if ($slider->slider_image && File::exists(public_path($slider->slider_image))) {
                File::delete(public_path($slider->slider_image));
            }

            // নতুন image upload
            $file     = $request->file('slider_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider_images'), $fileName);

            $sliderImage = 'uploads/slider_images/' . $fileName;
        }

        // Update data
        $slider->update([
            'slider_title'       => $request->slider_title,
            'slider_subtitle'    => $request->slider_subtitle,
            'slider_contents'    => $request->slider_contents,
            'slider_button_name' => $request->slider_button_name,
            'slider_button_link' => $request->slider_button_link,
            'slider_image'       => $sliderImage,
            'status'             => $request->status ?? 1,
        ]);

        $slider->seo()->updateOrCreate(
            [],
            [
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'Slider updated successfully!',
            'image'   => asset($slider->slider_image),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        // Old image delete
        if ($slider->slider_image && file_exists(public_path($slider->slider_image))) {
            unlink(public_path($slider->slider_image));
        }

        if ($slider->seo) {
            $slider->seo()->delete();
        }

        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully!');
    }
}
