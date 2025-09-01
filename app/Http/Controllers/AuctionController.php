<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        // Get all auctions with their related product + images
        $auctions = Auction::with('product.images')->get();

        return view('auctions.index', compact('auctions'));
    }

    public function view($id) {
        $auction = \App\Models\Auction::with('product.images')->findOrFail($id);
        return view('auctions.view', compact('auction')); // ✅ using view.blade.php
    }


}
