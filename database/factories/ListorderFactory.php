<?php

namespace Database\Factories;

use App\Models\listorder;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListorderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = listorder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_order' => $this->faker->dateTimeThisYear(),
            'name_product' => $this->faker->word(),
            'quantity' => $this->faker->randomDigit(),
            'total' => $this->faker->numberBetween(10000, 10000000),
            'resource_id' => Resource::factory()
        ];
    }
}
