<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'file_path' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }

}
