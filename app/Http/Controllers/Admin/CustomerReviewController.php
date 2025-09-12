<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CustomerReview;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ReviewSectionTitle;
use Illuminate\Support\Facades\File;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectionTitle = ReviewSectionTitle::first();
        $customerReviews = CustomerReview::all();
        return view('admin.layouts.pages.home-page.review.index', compact('customerReviews','sectionTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.home-page.review.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'client_name'        => 'required|string|max:255',
            'client_designation' => 'nullable|string|max:255',
            'client_ratings'     => 'nullable|string|max:10',
            'client_review'      => 'nullable|string',
            'client_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'status'             => 'nullable|in:0,1',
        ]);

        $clientImage = null;

        if ($request->hasFile('client_image')) {
            $file     = $request->file('client_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/customer_reviews'), $fileName);
            $clientImage = 'uploads/customer_reviews/' . $fileName;
        }

        $review = CustomerReview::create([
            'client_name'        => $request->client_name,
            'client_designation' => $request->client_designation,
            'client_ratings'     => $request->client_ratings,
            'client_review'      => $request->client_review,
            'client_image'       => $clientImage,
            'status'             => $request->status ?? 1,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Customer review added successfully!',
            'image'   => $clientImage ? asset($clientImage) : null,
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
        $review = CustomerReview::findOrFail($id);
        return view('admin.layouts.pages.home-page.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $review = CustomerReview::findOrFail($id);

        $request->validate([
            'client_name'        => 'required|string|max:255',
            'client_designation' => 'nullable|string|max:255',
            'client_ratings'     => 'nullable|string|max:10',
            'client_review'      => 'nullable|string',
            'client_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
            'status'             => 'nullable|in:0,1',
        ]);

        $clientImage = $review->client_image;

        // Image update
        if ($request->hasFile('client_image')) {

            if ($review->client_image && File::exists(public_path($review->client_image))) {
                File::delete(public_path($review->client_image));
            }

            $file     = $request->file('client_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/customer_reviews'), $fileName);

            $clientImage = 'uploads/customer_reviews/' . $fileName;
        }

        // Update data
        $review->update([
            'client_name'        => $request->client_name,
            'client_designation' => $request->client_designation,
            'client_ratings'     => $request->client_ratings,
            'client_review'      => $request->client_review,
            'client_image'       => $clientImage,
            'status'             => $request->status ?? 1,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Customer Review updated successfully!',
            'image'   => asset($clientImage),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = CustomerReview::findOrFail($id);

        if ($review->client_image && File::exists(public_path($review->client_image))) {
            File::delete(public_path($review->client_image));
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review Deleted Successfully.');
    }


    public function updateSectionTitle(Request $request)
    {

        $request->validate([
            'review_tagline'         => 'nullable|string|max:255',
            'review_title'           => 'required|string|max:255',
            'review_title_highlight' => 'nullable|string|max:255',
        ]);

        $titles = DB::table('review_section_titles')->first();

        if ($titles) {

            DB::table('review_section_titles')->where('id', $titles->id)->update([
                'review_tagline'         => $request->review_tagline,
                'review_title'           => $request->review_title,
                'review_title_highlight' => $request->review_title_highlight,
                'updated_at'             => now(),
            ]);
        } else {

            DB::table('review_section_titles')->insert([
                'review_tagline'         => $request->review_tagline,
                'review_title'           => $request->review_title,
                'review_title_highlight' => $request->review_title_highlight,
                'created_at'             => now(),
                'updated_at'             => now(),
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Review titles updated successfully!',
        ]);
    }
}
