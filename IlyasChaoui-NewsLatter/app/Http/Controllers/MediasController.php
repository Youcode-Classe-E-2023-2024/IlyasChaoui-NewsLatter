<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Role;


class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('Dashboard.media');
    }

    /**
     * Display a listing of the resource.
     */
    public function showMedias(Request $request)
    {
        $layout = 'layouts.dashboard-layout';
        $medias = Medias::all();
        $allUsers = User::all();
        $roles = Role::all();

        return view('Dashboard.dashboard', [
            'medias' => $medias,
            'layout' => $layout,
            'allUsers' => $allUsers,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store()
    {
        $userId = Auth::id();
        $media = Medias::create([
            "user_id" => $userId
        ]);

        // Add the uploaded image to the media collection
        $media->addMediaFromRequest('image')->toMediaCollection();
        // Handle success scenario
        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Find the media by its ID
        $media = Media::find($id);

        if (!$media) {
            return redirect()->back()->with('error', 'Media not found.');
        }
        $media->delete();

        return redirect()->back()->with('success', 'Media deleted successfully.');
    }
}
