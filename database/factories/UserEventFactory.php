<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->date($format = 'Y-m-d', $max = 'now');
        return [
            'name' =>  Str::random(10),
            'start_date' => $start,
            'end_date' => $this->faker->date($format = 'Y-m-d', $min = $start),
            'user_id' => User::factory()
        ];
    }
}
