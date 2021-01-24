<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       => 1,
            'slug'          => $this->faker->domainWord,
            'title'         => $this->faker->sentence(),
            'author'        => $this->faker->name(),
            'description'   => $this->faker->paragraph(3),
            'image'         => 'https://source.unsplash.com/featured/?sig='. $this->faker->numberBetween(100, 900) .'&book',
            'review'        => $this->faker->paragraph(7),
            'rating'        => $this->faker->numberBetween(2, 5),
            'purchase'      => $this->faker->url,
            'amazon'        => $this->faker->url,
            'completed'     => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
