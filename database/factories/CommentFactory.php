<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //id	user_id	post_id	content	parent_comment	deleted_at	created_at	updated_at
            //parent_comment is column values  (null,id) `id ` referencess to id comment
            'user_id'=>$this->faker->numberBetween(1,40),
            'post_id'=>23,
            'content'=>$this->faker->realTextBetween(150,200),
            'parent_comment' => null
        ];
    }
}
