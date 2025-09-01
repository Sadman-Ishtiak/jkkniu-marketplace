<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auction;
use App\Models\ProductImage;

class AuctionSeeder extends Seeder
{
    public function run(): void
    {
        // Create 45 auctions with products + at least 1 image each
        Auction::factory(45)
            ->hasProduct(1, function (array $attributes, $auction) {
                return [
                    // Each product gets 2 random images
                ];
            })
            ->create()
            ->each(function ($auction) {
                $auction->product->images()->createMany([
                    ['url' => 'https://picsum.photos/seed/' . uniqid() . '/600/400'],
                    ['url' => 'https://picsum.photos/seed/' . uniqid() . '/600/400'],
                ]);
            });
    }
}
