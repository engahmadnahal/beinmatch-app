<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->numberBetween(1,1000),
            'title' => $this->faker->title,
            'thumnail' => $this->faker->imageUrl,
            'content' => $this->faker->realTextBetween(1000,1500),
            'publish_at' => $this->faker->time('Y-m-d H:i:s'),
            'send_notfi' => $this->faker->time('Y-m-d H:i:s'),
            'status' => "done",


        ];
    }
}
