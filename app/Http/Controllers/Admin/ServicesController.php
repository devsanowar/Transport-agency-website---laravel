<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.layouts.pages.home-page.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.home-page.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_short_description' => 'nullable|string',
            'service_long_description' => 'nullable|string',
            'service_features.*' => 'nullable|string|max:255',
            'service_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'service_single_page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'service_feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'service_featuretwo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'status' => 'required|in:0,1',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $service = new Service();
        $service->service_title = $request->service_title;
        $service->service_slug = Str::slug($request->service_title);

        $service->service_short_description = $request->service_short_description;
        $service->service_long_description = $request->service_long_description;
        $service->service_features = json_encode($request->service_features ?? []);


        // Upload images if exist
        $images = [
            'service_thumbnail' => '_thumb',
            'service_single_page_image' => '_single',
            'service_feature_image' => '_feature',
            'service_featuretwo_image' => '_feature2',
        ];

        foreach ($images as $field => $suffix) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = time() . $suffix . '.' . $file->extension();
                $file->move(public_path('uploads/service_images'), $fileName);
                $service->$field = 'uploads/service_images/' . $fileName;
            }
        }



        // Feature titles and descriptions
        $service->service_feature_title = $request->service_feature_title;
        $service->service_feature_description = $request->service_feature_description;
        $service->service_featuretwo_title = $request->service_featuretwo_title;
        $service->service_featuretwo_description = $request->service_featuretwo_description;

        $service->status = $request->status;

        $service->save();

        // SEO
        $service->seo()->updateOrCreate(
            [],
            [
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully!'
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
        $service = Service::findOrFail($id);
        return view('admin.layouts.pages.home-page.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_short_description' => 'nullable|string',
            'service_long_description' => 'nullable|string',
            'service_features.*' => 'nullable|string|max:255',
            'service_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'service_single_page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'service_feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'service_featuretwo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'status' => 'required|in:0,1',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $service = Service::findOrFail($id);

        // Basic info
        $service->service_title = $request->service_title;
        $service->service_slug = Str::slug($request->service_title);
        $service->service_short_description = $request->service_short_description;
        $service->service_long_description = $request->service_long_description;

        // Features (casting থাকলে encode দরকার নেই)
        $service->service_features = array_filter($request->service_features ?? []);


        $images = [
            'service_thumbnail' => '_thumb',
            'service_single_page_image' => '_single',
            'service_feature_image' => '_feature',
            'service_featuretwo_image' => '_feature2',
        ];

        foreach ($images as $field => $suffix) {
            if ($request->hasFile($field)) {

                if ($service->$field && file_exists(public_path($service->$field))) {
                    unlink(public_path($service->$field));
                }


                $file = $request->file($field);
                $fileName = time() . $suffix . '.' . $file->extension();
                $file->move(public_path('uploads/service_images'), $fileName);
                $service->$field = 'uploads/service_images/' . $fileName;
            }
        }


        $service->service_feature_title = $request->service_feature_title;
        $service->service_feature_description = $request->service_feature_description;
        $service->service_featuretwo_title = $request->service_featuretwo_title;
        $service->service_featuretwo_description = $request->service_featuretwo_description;

        $service->status = $request->status;

        $service->save();


        $service->seo()->updateOrCreate(
            ['seoable_id' => $service->id, 'seoable_type' => Service::class],
            [
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Service updated successfully!',
            'data' => [
                'service_thumbnail' => $service->service_thumbnail ? asset($service->service_thumbnail) : null,
                'service_single_page_image' => $service->service_single_page_image ? asset($service->service_single_page_image) : null,
                'service_feature_image' => $service->service_feature_image ? asset($service->service_feature_image) : null,
                'service_featuretwo_image' => $service->service_featuretwo_image ? asset($service->service_featuretwo_image) : null,
            ]
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // Delete related images
        $images = [
            'service_thumbnail',
            'service_single_page_image',
            'service_feature_image',
            'service_featuretwo_image',
        ];

        foreach ($images as $field) {
            if ($service->$field && file_exists(public_path($service->$field))) {
                unlink(public_path($service->$field));
            }
        }

        // Delete SEO if exists
        if ($service->seo) {
            $service->seo->delete();
        }

        // Delete service itself
        $service->delete();

        return redirect()->route('services.index')->with('success','Serivce deleted successfully!');
    }
}
