<?php

namespace Database\Factories;

use App\Models\ExternalAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExternalAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExternalAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'     => $this->faker->title,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'extra_data' => json_encode([ $this->faker->title => $this->faker->name]),
        ];
    }
}
