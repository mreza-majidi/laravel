<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'mobile_number' => $this->faker->phoneNumber,
            'national_number' => rand(1000000000, 9999999999),
            'address' => $this->faker->address,
            'birth_date' => $this->faker->dateTime,

        ];
    }
}
