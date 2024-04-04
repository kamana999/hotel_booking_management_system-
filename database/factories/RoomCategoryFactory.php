<?php

namespace Database\Factories;

use App\Models\RoomCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoomCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'cost_per_day' => $this->faker->numberBetween(100, 1000),
            'discount_percentage' => $this->faker->numberBetween(0, 100),
            'max_child' => $this->faker->numberBetween(1, 10),
            'max_adult' => $this->faker->numberBetween(1, 10),
            'no_of_bed' => $this->faker->numberBetween(1, 10),
        ];
    }
}
