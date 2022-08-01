<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create(['name' => 'personal posts', 'slug' => 'personal']);
        $family = Category::create(['name' => 'family posts', 'slug' => 'family']);
        $food  = Category::create(['name' => 'food posts', 'slug' => 'food']);
        Post::create(['category_id' => $personal->id, 'user_id' => $user->id, 'title' => 'Mypersonalpost', 'excerpt' => 'exercept of this post', 'slug' => 'slug of this post', 'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.']);
        Post::create(['category_id' => $family->id, 'user_id' => $user->id, 'title' => 'Myfamilypost', 'excerpt' => 'exercept of this post', 'slug' => 'slug of this post', 'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.']);
        Post::create(['category_id' => $food->id, 'user_id' => $user->id, 'title' => 'Myfoodpost', 'excerpt' => 'exercept of this post', 'slug' => 'slug of this post', 'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.']);
    }
}
