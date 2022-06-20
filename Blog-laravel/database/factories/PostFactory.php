<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1,10),
            'slug'=> $this->faker->slug,
            'title' => $this->faker->sentence,
            'excerpt' => collect($this->faker->paragraphs(2, true))->map(fn($item) => "<p>{$item}</p>")->implode(''),
            'body'=> collect($this->faker->paragraphs(6))->map(fn($item) => "<p>{$item}</p>")->implode('')
/*            'excerpt' => $this->faker->paragraphs(2,true),
            'body' => $this->faker->paragraphs(6, true),*/

        ];
    }
}
