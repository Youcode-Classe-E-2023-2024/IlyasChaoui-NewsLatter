<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layout = 'layouts.backup-layout';
        $roles = Role::all();
        $allUsers = User::all();
        $medias = Medias::all();
        $newsletters = Newsletter::all();
        return view('Dashboard.dashboard', [
            'roles' => $roles,
            'newsletters' => $newsletters,
            'layout' => $layout,
            'medias' => $medias,
            'allUsers' => $allUsers
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
    public function show(string $id)
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
