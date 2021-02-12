<?php

namespace Database\Factories;
//mandamos a llamar nuestro modelo
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->word,
            'image' => $this->faker->word,
            'description' => $this->faker->text(20),
        ];
    }
}