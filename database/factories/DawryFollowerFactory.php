<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DawryFollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,10),
            'dawry_id'=>$this->faker->numberBetween(5,30)//
        ];
    }
}
