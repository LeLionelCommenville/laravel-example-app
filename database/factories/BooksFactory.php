<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'overview' => $this->faker->paragraph,
            'created_at' => now()
        ];
    }
}
