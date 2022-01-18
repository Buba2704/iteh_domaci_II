<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime' => $this->faker->firstName(),
            'prezime' => $this->faker->lastName(),
            'datumRodjenja' => $this->faker->date(),
            'adresa'=>$this->faker->address(),
            'brojTelefona' => $this->faker->phoneNumber()
        ];
    }
}
