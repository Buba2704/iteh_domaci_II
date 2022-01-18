<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KnjigaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->randomElement(['Ana Karenjina','Seobe','Kostana','Gorski vjenac']),
            'pisac' => $this->faker->name(),
            'zanr' => $this->faker->randomElement(['Drama','Biografija','Istorija']),
            'opis'=>$this->faker->sentence(),
            'datumIzdavanja' => $this->faker->dateTime(),
        ];
    }
}
