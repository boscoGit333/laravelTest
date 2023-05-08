<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Singer>
 */
class SingerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    

    public function definition()
    {
        $gita = ['Maschio','Femmina'];
        $geng = ['male','female'];
        $gint = rand(0,1);

        return [
            'nome' => fake()->unique()->name($gender=$geng[$gint]),
            'nascita' => fake()->dateTimeBetween($startDate = '-80 years', $endDate = '-15 years', $timezone = 'Europe/Paris'),
            'sesso' => $gita[$gint]
        ];
    }
}
