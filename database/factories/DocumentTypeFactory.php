<?php

namespace Database\Factories;

use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DocumentType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $required = [true, false];

        return [
            'title'    => $this->faker->title,
            'required' => $required[rand(0, 1)],
        ];
    }
}
