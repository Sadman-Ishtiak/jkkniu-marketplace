<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Update basic profile info (name, email, password)
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        Log::info('Profile update hit');

        return back()->with('success', 'Profile updated successfully.');
    }

    // (Optional) update extra data when you add columns to users
    public function updateExtra(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // This will only work after you add 'phone' and 'address' fields to users migration
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->save();

        return back()->with('success', 'Extra info updated successfully.');
    }
}
