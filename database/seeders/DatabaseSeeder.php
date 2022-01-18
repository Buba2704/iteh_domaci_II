<?php

namespace Database\Seeders;

use App\Models\Clan;
use App\Models\Knjiga;
use App\Models\Pozajmica;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Clan::truncate();
        Knjiga::truncate();
        Pozajmica::truncate();

        User::factory(2)->create();

        $knjige=Knjiga::factory(5)->create();
        $clanovi=Clan::factory(3)->create();

        Pozajmica::factory()->create([
           'knjiga_id'=>$knjige[0]->id,
           'clan_id'=>$clanovi[0]->id,
        ]);
        Pozajmica::factory()->create([
           'knjiga_id'=>$knjige[2]->id,
           'clan_id'=>$clanovi[1]->id,
        ]);
        Pozajmica::factory()->create([
           'knjiga_id'=>$knjige[4]->id,
           'clan_id'=>$clanovi[2]->id,
        ]);
    }
}
