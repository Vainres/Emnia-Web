<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
use App\Models\Good;
use App\Models\Comment;
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
        User::factory(10)->create()->each(function ($user) {
            Image::factory(5)->create([
                'user_id'=>$user->id,
            ])->each(function($image){
                Comment::factory(3)->create([
                    'user_id' => $image->user_id,
                    'image_id' => $image->id,
                ]);
            });
        });
    }
}
