<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Store, Product, Auction, Transaction, Review, Image, ProductImage, ReviewImage, AuctionImage};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create users
        $users = User::factory(20)->create();

        // Create stores with products
        $stores = Store::factory(5)
            ->has(Product::factory(10))
            ->create();

        // Create auctions
        $auctions = Auction::factory(10)->create()->each(function ($auction) {
            $images = Image::factory(3)->create();
            $auction->images()->attach($images->pluck('id'));
        });


        // Transactions
        Transaction::factory(50)->create();

        // Reviews
        Review::factory(30)->create();

        // Images (general pool)
        $images = Image::factory(50)->create();

        // Attach images to products
        ProductImage::factory(30)->create();

        // Attach images to reviews
        ReviewImage::factory(15)->create();

        // Attach images to auctions
        AuctionImage::factory(20)->create();
    }
}
