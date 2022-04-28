<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //id	user_id	post_id	is_like	deleted_at	created_at	updated_at

        return [
            'user_id'=>$this->faker->numberBetween(1,40),
            'post_id'=>23,
            'is_like'=>$this->faker->boolean()
        ];
    }
}
