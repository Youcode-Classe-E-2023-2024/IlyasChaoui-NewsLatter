<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
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
    public function show()
    {
        return response()
            ->view('auth.authentication')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    }

    public function store(Request $request)
    {
        /*
        Validation
        */
        $request->validate([
            'name' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        /*
        Handle File Upload
        */
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = 'assets-home/profileImages';

            $file->move(public_path($destinationPath), $filename);

            $picturePath = $destinationPath . '/' . $filename;
        }

        /*
        Database Insert
        */
        $user = User::create([
            'name' => $request->name,
            'picture' => $picturePath,
            'city' => $request->city,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
//         Auth::login($user);

        $user->assignRole('viewer');

        return redirect(RouteServiceProvider::LOGIN);
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
