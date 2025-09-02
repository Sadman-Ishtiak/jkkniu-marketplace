<?php

namespace Database\Factories;

use App\Models\{Review, Product, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'buyer_id' => User::factory(),
            'product_id' => Product::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->sentence(12),
            'created_at' => now(),
        ];
    }
}
