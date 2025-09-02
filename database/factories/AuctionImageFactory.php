<?php

namespace Database\Factories;

use App\Models\{AuctionImage, Auction, Image};
use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionImageFactory extends Factory
{
    protected $model = AuctionImage::class;

    public function definition(): array
    {
        return [
            'auction_id' => Auction::factory(),
            'image_id' => Image::factory(),
        ];
    }
}
