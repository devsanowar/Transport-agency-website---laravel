<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CTAController extends Controller
{
    public function index()
    {
        $cta = Cta::first();
        if (!$cta) {
            $cta = new Cta();
        }
        return view('admin.layouts.pages.home-page.cta.index', compact('cta'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'cta_content'     => 'nullable|string',
            'cta_phone'       => 'nullable|string|max:20',
            'cta_email'       => 'nullable|email|max:255',
            'cta_button'      => 'nullable|string|max:255',
            'cta_button_url'  => 'nullable|url|max:255',
            'cta_bg_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $cta = Cta::first();

        $ctaBgImage = $cta->cta_bg_image ?? null;

        if ($request->hasFile('cta_bg_image')) {
            if ($cta && $cta->cta_bg_image && File::exists(public_path($cta->cta_bg_image))) {
                File::delete(public_path($cta->cta_bg_image));
            }

            $file     = $request->file('cta_bg_image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/cta_images'), $fileName);

            $ctaBgImage = 'uploads/cta_images/' . $fileName;
        }

        $data = [
            'cta_content'    => $request->cta_content,
            'cta_phone'      => $request->cta_phone,
            'cta_email'      => $request->cta_email,
            'cta_button'     => $request->cta_button,
            'cta_button_url' => $request->cta_button_url,
            'cta_bg_image'   => $ctaBgImage,
        ];

        if ($cta) {
            $cta->update($data);
        } else {
            $cta = Cta::create($data);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'CTA updated successfully!',
            'image'   => asset($ctaBgImage),
        ]);
    }
}
