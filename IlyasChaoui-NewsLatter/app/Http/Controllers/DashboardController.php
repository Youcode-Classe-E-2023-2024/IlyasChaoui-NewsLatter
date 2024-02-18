<?php

namespace App\Http\Controllers;

use App\Models\Emaillist;
use App\Models\Newsletter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'user' => $request->user(),
            'counts' => [
                'usersCount' => User::count(),
                'mediaCount' => Media::count(),
                'templateCount' => Newsletter::count(),
                'subscribeEmailsCount' => Emaillist::count(),
            ],
            'roles' => Role::all(),
            'allUsers' => User::all(),
            'layout' => 'layouts.dashboard-layout',
            'lastInsertionTime' => [
                'User' =>  User::latest()->first()?->created_at->diffForHumans() ?? 'No Users Found',
//                'Email' =>  Emaillist::latest()->first()?->created_at->diffForHumans() ?? 'No Users Found',
                'Email' => 'No Subscribers Found',
                'Media' =>  Media::latest()->first()?->created_at->diffForHumans() ?? 'No Medias Found',
                'Template' =>  Newsletter::latest()->first()?->created_at->diffForHumans() ?? 'No Templates Found',
            ],
        ];

        return view('dashboard.dashboard', compact('data'));
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
