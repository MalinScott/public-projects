<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Jack Renalds'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $user2 = User::factory()->create([
            'name' => 'Jane Goodman'
        ]);
        Post::factory(5)->create([
            'user_id' => $user2->id,
        ]);


    }
}
