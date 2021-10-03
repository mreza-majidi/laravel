<?php

namespace Database\Factories;

use App\Constants\AnnouncementConstants;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'priority'  => $this->faker->randomElement(AnnouncementConstants::PRIORITIES),
            'begin'     => $this->faker->dateTime,
            'end'       => $this->faker->dateTime,
            'is_active' => $this->faker->boolean,
            'text'      => $this->faker->text,
        ];
    }
}
