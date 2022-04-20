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
        $st = ['done', 'wite', 'cancel'];
        $resultStatus = $st[rand(0,2)];
        return [
            'employee_id' => 1,
            'dawry_id' => $this->faker->numberBetween(5,30),
            'title' => $this->faker->realTextBetween(20,60),
            'thumnail' => $this->faker->imageUrl,
            'content' => $this->faker->realTextBetween(1000,1500),
            'publish_at' => $this->faker->time('Y-m-d H:i:s'),
            'send_notfi' => $this->faker->time('Y-m-d H:i:s'),
            'status' => $resultStatus,


        ];
    }
}
