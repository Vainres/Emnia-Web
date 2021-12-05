<?php

namespace Database\Factories;

use App\Models\Image;
use Faker\Factory as facker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = facker::create('vi_VN');
        return [
            'name' => $faker->sentence(),
            'detail' => $faker->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
