<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        // Save product
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description ?? '',
            'seller_id' => auth()->id(),
            'stock' => $request->stock ?? 0,
        ]);

        // Handle image if uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');

            $image = Image::create(['url' => $path]);

            ProductImage::create([
                'product_id' => $product->id,
                'image_id' => $image->id
            ]);
        }

        return redirect()->back()->with('success', 'Product created successfully!');
    }
}
