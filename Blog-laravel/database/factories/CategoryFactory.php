<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //faker->randomElement(['Personal', 'Work', 'Hobby', 'News', 'Outdoors', 'Government'])
        return [
            'name' => $this->faker->unique()->randomElement(['Personal', 'Work', 'Hobby', 'News', 'Outdoors', 'Government','Vacation','Sports', 'Beauty','Dogs','Cooking','Hunting']),
            'slug' => $this->faker->slug,

        ];
    }
}
