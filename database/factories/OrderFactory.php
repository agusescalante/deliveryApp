<?php

namespace Database\Factories;
use App\Models\Employee;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' =>$this->faker->randomNumber(3,false),
            'description' => $this->faker->randomElement(['Cerceza Antares 1L','Papas Lays 100g','Gomitas Mogul 250g']),
            'received' => false,
            'employee_id' => Employee::factory()->create(),
            'user_id' =>User::factory()->create(),
        ];
    }
}
