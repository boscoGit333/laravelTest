<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'titolo' => fake()->realText($maxNbChars = 64),
            'titolo' => fake()->words($nb = rand(3,10), $asText = true) ,
            'pubblicazione' => fake()->dateTimeThisCentury()
        ];
    }
}
