<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition(): array
    {
        return [
            'owner_id' => User::factory(), // each store belongs to a user
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'mail' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'banner' => 'https://picsum.photos/seed/' . $this->faker->uuid . '/1200/300',
            'logo' => 'https://picsum.photos/seed/' . $this->faker->uuid . '/200/200',
            'status' => 'active',
            'approved_by' => null, // or set to some admin id if needed
        ];
    }
}
