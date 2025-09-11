<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::latest()->get();
        return view('admin.layouts.pages.home-page.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.home-page.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'feature_title'       => 'required|string',
            'feature_content'    => 'nullable|string',
            'feature_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:200',
            'status'             => 'nullable|in:1,0',
        ]);

        $maxOrder = Feature::max('order_by');  // সর্বোচ্চ order_by বের করলাম
        $nextOrder = $maxOrder ? $maxOrder + 1 : 1;

        // default image
        $featureImage = 'uploads/feature_images/default.png';

        if ($request->hasFile('feature_image')) {
            $file     = $request->file('feature_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/feature_images'), $fileName);
            $featureImage = 'uploads/feature_images/' . $fileName;
        }

        $feature = Feature::create([
            'feature_title'       => $request->feature_title,
            'feature_content'    => $request->feature_content,
            'feature_image'       => $featureImage,
            'status'             => $request->status ?? 1,
            'order_by'             => $nextOrder,
        ]);

        // SEO (optional)
        $feature->seo()->create([
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Feature created successfully.',
            'data'    => $feature,
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
        $feature = Feature::findOrFail($id);
        return view('admin.layouts.pages.home-page.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $feature = Feature::findOrFail($id);

        $request->validate([
            'feature_title'      => 'required|string',
            'feature_content'    => 'nullable|string',
            'feature_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'order_by'           => 'nullable|string',
            'status'             => 'nullable|in:0,1',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string',
            'meta_description'   => 'nullable|string',
        ]);

        // Image update logic
        $featureImage = $feature->feature_image; // পুরনো image রাখছি default হিসেবে

        if ($request->hasFile('feature_image')) {
            if ($feature->feature_image && File::exists(public_path($feature->feature_image))) {
                File::delete(public_path($feature->feature_image));
            }

            $file     = $request->file('feature_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/feature_images'), $fileName);

            $featureImage = 'uploads/feature_images/' . $fileName;
        }

        // Update data
        $feature->update([
            'feature_title'         => $request->feature_title,
            'feature_content'       => $request->feature_content,
            'order_by'              => $request->order_by,
            'feature_image'         => $featureImage,
            'status'                => $request->status ?? 1,
        ]);

        $feature->seo()->updateOrCreate(
            [],
            [
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'Feature updated successfully!',
            'image'   => asset($feature->feature_image),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = Feature::findOrFail($id);

        // Old image delete
        if ($feature->feature_image && file_exists(public_path($feature->feature_image))) {
            unlink(public_path($feature->feature_image));
        }

        if ($feature->seo) {
            $feature->seo()->delete();
        }

        $feature->delete();

        return redirect()->route('feature.index')->with('success', 'Feature deleted successfully!');
    }
}
