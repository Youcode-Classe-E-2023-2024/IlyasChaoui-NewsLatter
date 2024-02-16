<?php

namespace App\Http\Controllers;

use App\Models\Emaillist;
use App\Models\Medias;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showProfile(Request $request)
    {
        return view('Dashboard.dashboard', [
            'user' => $request->user()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showUserTable()
    {
        $layout = 'layouts.dashboard-layout';
        $users = User::paginate(6, ['*'], 'users');
        $emails = Emaillist::paginate(6, ['*'], 'emails');
        $medias = Medias::paginate(6, ['*'], 'medias');
        $allUsers = User::all();
        $roles = Role::all();

        return view('Dashboard.dashboard', [
            'users' => $users,
            'medias' => $medias,
            'layout' => $layout,
            'emails' => $emails,
            'allUsers' => $allUsers,
            'roles' => $roles
        ]);
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->city = $request->city;
            $user->phoneNumber = $request->phoneNumber;

            // Save the changes
            $user->save();

            // Redirect back or to another page with success message
            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            // Handle the error
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    function updateRole(Request $request) {
        $user = User::find($request->userId);
        $role = Role::find($request->id);

        $user->syncRoles($role);

        dd("success");


    }
}
