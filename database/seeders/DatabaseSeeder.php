<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
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
        Category::factory(30)->create();
        $user = User::factory()->create([
            'email' => 'admin@gmail.com'
        ]);
        Post::factory(10)->create([
            'user_id' =>    $user->id
        ]);
        Post::factory(10)->create();

    }
}
