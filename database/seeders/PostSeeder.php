<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = Storage::files('img');

        for ($i = 0; $i < 1000000; $i++) {
            $user = User::query()->inRandomOrder()->first();

            Post::query()->create([
                'user_id' => $user->id,
                'image' => fake()->randomElement($files),
                'title' => fake()->text(50),
                'content' => fake()->text(150),
            ]);
        }
    }
}
