<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * id	fname	lname	username	avater
         * email	email_verified_at	password
         * salary	jop_title	type
         * phone	gender	is_online	status

         */
        return [
            'fname'=>$this->faker->firstName(),
            'lname'=>$this->faker->lastName(),
            'username'=>$this->faker->userName(),
            'avater'=>$this->faker->imageUrl(),
            'email'=>$this->faker->email(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'salary'=>$this->faker->numberBetween(300,1500),
            'jop_title'=>'Admin',
            'phone'=>$this->faker->numberBetween(000000,9999999),
            'gender'=>"M",
            'is_online'=>$this->faker->boolean(),
            'status'=>"active"
        ];
    }
}
