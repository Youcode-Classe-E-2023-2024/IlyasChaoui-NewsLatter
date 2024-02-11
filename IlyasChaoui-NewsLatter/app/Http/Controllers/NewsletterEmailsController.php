<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\Emaillist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterEmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::count(); //
        $subscribeEmails = Emaillist::count();

        // Passing data to the view
        return view('Dashboard.dashboard', [
            'user' => $request->user(),
            'usersCount' => $users,
            'subscribeEmailsCount' => $subscribeEmails
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:emaillists,email'
        ]);

        event(new UserSubscribed($request->input('email')));
        return back();
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
