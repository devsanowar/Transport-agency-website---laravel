<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsFeature;
use Illuminate\Http\Request;

class WhyChooseFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $section = WhyChooseUs::first() ?? new WhyChooseUs;

        $features = WhyChooseUsFeature::with('section')
            ->where('why_choose_id', $section->id)
            ->latest()
            ->get();

        return view('admin.layouts.pages.about-page.whyc-choose-us.features.index', compact('features', 'section'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'why_choose_id' => 'required|exists:why_choose_us,id',
        ]);

        // Handle file upload
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/why_choose_features'), $filename);
            $iconPath = 'uploads/why_choose_features/' . $filename;
        }

        // Create feature
        WhyChooseUsFeature::create([
            'why_choose_id' => $request->why_choose_id,
            'icon' => $iconPath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Features added successfully.'
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
    public function edit($id)
    {
        $feature = WhyChooseUsFeature::findOrFail($id);

        return response()->json($feature);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $feature = WhyChooseUsFeature::findOrFail($id);

        if ($request->hasFile('icon')) {
            if ($feature->icon && file_exists(public_path($feature->icon))) {
                unlink(public_path($feature->icon));
            }

            $file = $request->file('icon');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/why_choose_features/' . $fileName;
            $file->move(public_path('uploads/why_choose_features'), $fileName);

            $feature->icon = $filePath;
        }

        // Update other fields
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Feature updated successfully',
            'feature' => $feature
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feature = WhyChooseUsFeature::findOrFail($id);

        if ($feature->icon && file_exists(public_path($feature->icon))) {
            unlink(public_path($feature->icon));
        }

        $feature->delete();

        return redirect()->back()->with('success','Feature deleted successfully');
    }
}
