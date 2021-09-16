<?php

namespace Database\Factories;

use App\Models\Income;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Income::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_income' => $this->faker->dateTimeThisYear(),
            'name_product' => $this->faker->word(),
            'quantity' => $this->faker->randomDigit(),
            'total' => $this->faker->numberBetween(100000000, 300000000),
            'resource_id' => Resource::factory()
        ];
    }
}
