<?php

namespace Database\Factories;

use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExpensesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Data::class;
    public function definition(): array
    {
        return [
            'category' => $this->faker->randomElement(['Food','Beverage','Merchandise', 'Marketing','Utilities','Repairs and Maintenance', 'Others']),
            'name' => $this->faker->word,
            'amount' => $this->faker->numberBetween($min = 1, $max =20),
            'date' => $this->faker->dateTimeBetween('-12 months', '+1 months'),
        ];
    }
}
