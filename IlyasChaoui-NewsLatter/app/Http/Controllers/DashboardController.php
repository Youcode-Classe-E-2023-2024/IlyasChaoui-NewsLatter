<?php

namespace App\Http\Controllers;

use App\Models\Emaillist;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Determine the layout based on the request URL
        $layout = 'layouts.dashboard-layout';
        // Retrieving data
        $usersCount = User::count();
        $subscribeEmailsCount = Emaillist::count();
        $roles = Role::all();
        $allUsers = User::all();

        // Passing data to the view along with the layout
        return view('dashboard.dashboard', [
            'user' => $request->user(),
            'usersCount' => $usersCount,
            'subscribeEmailsCount' => $subscribeEmailsCount,
            'roles' => $roles,
            'allUsers' => $allUsers,
            'layout' => $layout
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function changeRole()
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
    public function destroy(string $id)
    {
        //
    }
}
