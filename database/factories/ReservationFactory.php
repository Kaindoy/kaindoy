<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'guest_name' => $this->faker->name,
            'room_number' => $this->faker->numberBetween(100, 500),
            'check_in' => $this->faker->dateTimeBetween('+0 days', '+1 month'),
            'check_out' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
