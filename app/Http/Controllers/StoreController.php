<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class StoreController extends Controller
{
    // Request a new store (status = pending)
    public function requestStore(Request $request)
    {
        $request->validate([
            'store_name'  => 'required|string|max:255|unique:stores,name',
            'description' => 'required|string',
        ]);

        Store::create([
            'owner_id'    => Auth::id(),
            'name'        => $request->store_name,
            'description' => $request->description,
            'phone'       => '',  // fill later
            'mail'        => Auth::user()->email,
            'address'     => '',
            'banner'      => null,
            'logo'        => null,
            'status'      => 'pending',
        ]);

        return back()->with('success', 'Store request submitted. Waiting for admin approval.');
    }
}
