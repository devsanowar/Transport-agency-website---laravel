<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.layouts.pages.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_member_name' => 'required|string|max:255',
            'team_member_designation' => 'required|string|max:255',
            'team_member_phone' => 'required|string|max:20',
            'team_member_email' => 'nullable|email|max:255',
            'team_member_about' => 'nullable|string',
            'team_member_address' => 'nullable|string|max:255',
            'team_member_facebook' => 'nullable|url',
            'team_member_linkeding' => 'nullable|url',
            'team_member_instagram' => 'nullable|url',
            'team_member_twitter' => 'nullable|url',
            'team_member_youtube' => 'nullable|url',
            'team_member_website' => 'nullable|url',
            'team_member_printerest' => 'nullable|url',
            'team_member_tiktok' => 'nullable|url',
            'team_member_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('team_member_image');

        if ($request->hasFile('team_member_image')) {
            $image = $request->file('team_member_image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/team_image'), $filename);

            $data['team_member_image'] = 'uploads/team_image/' . $filename;
        }

        Team::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Team member created successfully!',
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
        $team = Team::findOrFail($id);
        return view('admin.layouts.pages.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'team_member_name'        => 'required|string|max:255',
            'team_member_designation' => 'required|string|max:255',
            'team_member_phone'       => 'required|string|max:20',
            'team_member_email'       => 'nullable|email|max:255',
            'team_member_about'       => 'nullable|string',
            'team_member_address'     => 'nullable|string|max:255',
            'team_member_facebook'    => 'nullable|url',
            'team_member_linkeding'   => 'nullable|url',
            'team_member_instagram'   => 'nullable|url',
            'team_member_twitter'     => 'nullable|url',
            'team_member_youtube'     => 'nullable|url',
            'team_member_website'     => 'nullable|url',
            'team_member_printerest'  => 'nullable|url',
            'team_member_tiktok'      => 'nullable|url',
            'team_member_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $team = Team::findOrFail($id);

        $data = $request->except('team_member_image');

        if ($request->hasFile('team_member_image')) {

            if ($team->team_member_image && file_exists(public_path($team->team_member_image))) {
                unlink(public_path($team->team_member_image));
            }

            $image = $request->file('team_member_image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/team_image/' . $filename;
            $image->move(public_path('uploads/team_image'), $filename);

            $data['team_member_image'] = $path;
        }

        $team->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Team member updated successfully!',
            'team_member_image' => $team->team_member_image ? asset($team->team_member_image) : null,

        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if ($team->team_member_image && file_exists(public_path($team->team_member_image))) {
            unlink(public_path($team->team_member_image));
        }


        $team->delete();

        return redirect()->route('team.index')->with('success', 'Team deleted successfully!');
    }
}
