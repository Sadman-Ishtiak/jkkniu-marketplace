<?php

namespace Database\Factories;

use App\Models\Auction;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionFactory extends Factory
{
    protected $model = Auction::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'starting_price' => $this->faker->randomFloat(2, 20, 200),
            'end_time' => now()->addDays(rand(1, 10)),
        ];
    }
}
