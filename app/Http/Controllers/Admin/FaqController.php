<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.layouts.pages.FAQ.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.FAQ.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'status'   => 'required|in:0,1',
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->status   = $request->status;
        $faq->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'FAQ created successfully!',
            'faq'     => $faq
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
        $faq = Faq::findOrFail($id);
        return view('admin.layouts.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'status'   => 'required|in:0,1',
        ]);


        $faq = Faq::findOrFail($id);

        $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer,
            'status'   => $request->status,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'FAQ updated successfully',
            'faq'     => $faq
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'Faq deleted successfully!');
    }

}
