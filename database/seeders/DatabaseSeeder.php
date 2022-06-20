<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        
        User::factory(3)->create();

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion'
        ]);

        Category::create([
            'name' => 'Beauty',
            'slug' => 'beauty'
        ]);

        Post::factory(15)->create();

    }
}
