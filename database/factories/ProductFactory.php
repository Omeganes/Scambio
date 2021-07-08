<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'images' => [$this->faker->imageUrl(), $this->faker->imageUrl(), $this->faker->imageUrl()],
            'price' => $this->faker->numberBetween(1, 1000),
            'status' => $this->faker->randomElement(['new', 'used']),
            'user_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
