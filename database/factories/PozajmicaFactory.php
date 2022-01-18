<?php

namespace Database\Factories;

use App\Models\Clan;
use App\Models\Knjiga;
use Illuminate\Database\Eloquent\Factories\Factory;

class PozajmicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'datum' => $this->faker->dateTime(),
            'knjiga_id' => Knjiga::factory(),
            'clan_id' => Clan::factory(),
            'napomena'=>$this->faker->sentence()
        ];
    }
}
