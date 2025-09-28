<?php

namespace App\Http\Controllers\Admin;

use App\Models\Breadcrumb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BreadcrumbController extends Controller
{
    public function update(Request $request)
    {
        $breadcrumb = Breadcrumb::first();
        if (!$breadcrumb) {
            $breadcrumb = new breadcrumb;
        }

        $uploadPath = public_path('uploads/breadcrumb_image');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        // Background delete
        if ($request->has('bgPreview_delete')) {
            if (File::exists(public_path($breadcrumb->breadcrumb_bg_image))) {
                File::delete(public_path($breadcrumb->breadcrumb_bg_image));
            }
            $breadcrumb->breadcrumb_bg_image = 'page-header-bg.jpg';
        } elseif ($request->hasFile('breadcrumb_bg_image')) {
            $file = $request->file('breadcrumb_bg_image');
            $filename = time() . '_bg.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $breadcrumb->breadcrumb_bg_image = 'uploads/breadcrumb_image/' . $filename;
        }

        // Header delete
        if ($request->has('headerPreview_delete')) {
            if (File::exists(public_path($breadcrumb->page_header_image))) {
                File::delete(public_path($breadcrumb->page_header_image));
            }
            $breadcrumb->page_header_image = 'page-header-bg.jpg';
        } elseif ($request->hasFile('page_header_image')) {
            $file = $request->file('page_header_image');
            $filename = time() . '_header.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $breadcrumb->page_header_image = 'uploads/breadcrumb_image/' . $filename;
        }

        // Container delete
        if ($request->has('containerPreview_delete')) {
            if (File::exists(public_path($breadcrumb->container_box_image))) {
                File::delete(public_path($breadcrumb->container_box_image));
            }
            $breadcrumb->container_box_image = 'page-header-bg.jpg';
        } elseif ($request->hasFile('container_box_image')) {
            $file = $request->file('container_box_image');
            $filename = time() . '_container.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $breadcrumb->container_box_image = 'uploads/breadcrumb_image/' . $filename;
        }

        $breadcrumb->status = $request->status;
        $breadcrumb->save();

        return response()->json([
            'success' => true,
            'message' => 'Breadcrumb updated successfully!',
            'data' => $breadcrumb
        ]);
    }
}
