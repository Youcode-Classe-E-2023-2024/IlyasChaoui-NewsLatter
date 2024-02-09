<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterEmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()
            ->view('Editor.dashboard', [
                'user' => $request->user()
            ])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
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
