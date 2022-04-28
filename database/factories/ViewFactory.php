<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 	id	user_id	post_id	created_at	updated_at

            'user_id'=>$this->faker->numberBetween(1,40),
            'post_id'=>23,
        ];
    }
}
