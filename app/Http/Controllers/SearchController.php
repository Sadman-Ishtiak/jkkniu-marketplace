<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Or your relevant model

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }

        // Example: search in name and description columns
        $results = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('search.results', [
            'results' => $results,
            'query' => $query
        ]);
    }
}
