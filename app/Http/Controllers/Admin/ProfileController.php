<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.layouts.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone'       => ['nullable', 'string', 'max:15', 'regex:/^[0-9+\-() ]+$/'],
            'address'     => ['nullable', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:100'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->designation = $request->designation;
        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully.',
            'data' => $user
        ], 200);
    }


    public function updateImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();

    // Upload folder path
    $uploadFolder = 'uploads/profile_image';
    $uploadPath = public_path($uploadFolder);

    // যদি ফোল্ডার না থাকে, create করুন
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    // আগের image delete করুন, যদি থাকে
    if ($user->image && file_exists(public_path($user->image))) {
        unlink(public_path($user->image));
    }

    // নতুন image save করুন
    $imageFile = $request->file('image');
    $imageName = time() . '_' . $imageFile->getClientOriginalName();
    $imageFile->move($uploadPath, $imageName);

    // DB update – full path relative to public folder
    $user->image = $uploadFolder . '/' . $imageName;
    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Profile image updated successfully!',
        'image_url' => asset($user->image)
    ]);
}

}
