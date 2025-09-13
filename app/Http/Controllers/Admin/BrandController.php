<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.layouts.pages.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'brand_name'  => 'required|string|max:255',
            'brand_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:0,1',
        ]);

        $data = [
            'brand_name' => $request->brand_name,
            'status'     => $request->status,
        ];


        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/brands/' . $filename;
            $image->move(public_path('uploads/brands'), $filename);

            $data['brand_image'] = $path;
        }

        Brand::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Brand created successfully!',
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
        $brand = Brand::findOrFail($id);
        return view('admin.layouts.pages.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        // validation
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);

        try {
            $data = [
                'brand_name' => $request->brand_name,
                'status' => $request->status,
            ];

            // image update
            if ($request->hasFile('brand_image')) {
                // পুরানো image delete করো
                if ($brand->brand_image && file_exists(public_path($brand->brand_image))) {
                    unlink(public_path($brand->brand_image));
                }

                $image = $request->file('brand_image');
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/brands/' . $filename;
                $image->move(public_path('uploads/brands'), $filename);

                $data['brand_image'] = $path;
            }

            $brand->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Brand updated successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->brand_image && file_exists(public_path($brand->brand_image))) {
            unlink(public_path($brand->brand_image));
        }


        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully!');
    }
}
