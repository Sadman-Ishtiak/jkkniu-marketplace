<?php

namespace Database\Factories;

use App\Models\{ReviewImage, Review, Image};
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewImageFactory extends Factory
{
    protected $model = ReviewImage::class;

    public function definition(): array
    {
        return [
            'review_id' => Review::factory(),
            'image_id' => Image::factory(),
        ];
    }
}
