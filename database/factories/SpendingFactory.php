<?php

namespace Database\Factories;

use App\Models\Spending;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpendingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spending::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_spending' => $this->faker->dateTimeThisYear(),
            'total' => $this->faker->numberBetween(10000000, 100000000),
            'resource_id' => Resource::factory()
        ];
    }
}
