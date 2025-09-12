<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::latest()->get();
        return view('admin.layouts.pages.home-page.achievement.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.home-page.achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'achievement_title'   => 'required|string|max:255',
            'achievement_count'   => 'required|numeric',
            'achievement_icon'    => 'nullable|image|mimes:png,jpg,jpeg,svg|max:200',
            'status'             => 'required|boolean',
            'meta_title'         => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string',
        ]);

        $maxOrder = Achievement::max('order_by');
        $nextOrder = $maxOrder ? $maxOrder + 1 : 1;

        $achievement = new Achievement();
        $achievement->achievement_title = $request->achievement_title;
        $achievement->achievement_count = $request->achievement_count;
        $achievement->order_by = $nextOrder;
        $achievement->status = $request->status;


        // --- Upload Icon (save full path in DB) ---
        if ($request->hasFile('achievement_icon')) {
            $file = $request->file('achievement_icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/achievement_icons'), $filename);

            // Save with path
            $achievement->achievement_icon = 'uploads/achievement_icons/' . $filename;
        } else {
            // Default icon path
            $achievement->achievement_icon = 'uploads/achievement_icons/icon.png';
        }

        $achievement->save();

        $achievement->seo()->updateOrCreate(
            [],
            [
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Achievement created successfully!',
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
        $achievement = Achievement::findOrFail($id);
        return view('admin.layouts.pages.home-page.achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $achievement = Achievement::findOrFail($id);

        $request->validate([
            'achievement_title'  => 'required|string|max:255',
            'achievement_count'  => 'nullable|string',
            'achievement_icon'   => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',

            'order_by'          => 'nullable|string',
            'status'            => 'nullable|in:0,1',
            'seo_title'         => 'nullable|string|max:255',
            'seo_keywords'      => 'nullable|string',
            'seo_description'   => 'nullable|string',
        ]);


        $iconPath = $achievement->achievement_icon;

        if ($request->hasFile('achievement_icon')) {
            if ($achievement->achievement_icon && File::exists(public_path($achievement->achievement_icon))) {
                File::delete(public_path($achievement->achievement_icon));
            }

            $file     = $request->file('achievement_icon');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/achievement_icons'), $fileName);

            $iconPath = 'uploads/achievement_icons/' . $fileName;
        }


        $achievement->update([
            'achievement_title'   => $request->achievement_title,
            'achievement_count'   => $request->achievement_count,
            'achievement_icon'    => $iconPath,
            'order_by'           => $request->order_by,
            'status'             => $request->status ?? 1,
        ]);


        $achievement->seo()->updateOrCreate(
            [],
            [
                'meta_title'       => $request->seo_title,
                'meta_keywords'    => $request->seo_keywords,
                'meta_description' => $request->seo_description,
            ]
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'Achievement updated successfully!',
            'image'   => asset($achievement->achievement_icon),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);

        // Old image delete
        if ($achievement->achievement_icon && file_exists(public_path($achievement->achievement_icon))) {
            unlink(public_path($achievement->achievement_icon));
        }

        if ($achievement->seo) {
            $achievement->seo()->delete();
        }

        $achievement->delete();

        return redirect()->route('achievement.index')->with('success', 'Achievement deleted successfully!');
    }
}
