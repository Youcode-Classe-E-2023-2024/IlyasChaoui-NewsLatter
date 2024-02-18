<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\Emaillist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class NewsletterEmailsController extends Controller
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
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emaillists,email',
        ], [
            'email.unique' => 'The email has already been subscribed.',
        ]);

        event(new UserSubscribed($request->input('email')));

        return back()->with('success', 'You have successfully subscribed.');
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
    public function delete($id)
    {
        // Find the media by its ID
        $subscriber = Emaillist::findOrFail($id);
        if (!$subscriber) {
            return redirect()->back()->with('error', 'Media not found.');
        }
        $subscriber->delete();
        return redirect()->back()->with('success', 'Template deleted successfulnesses.');
    }
}
