<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('games')->truncate();

        $games = [];
        for($i = 0; $i < 100; $i++) {
            $games[] = [
                'title' => $faker->words($faker->numberBetween(1, 3),true),
                'describe' => $faker->sentence,
                'publisher' => $faker->randomElement(['Atari', 'EA', 'Blizzard', 'Ubosift']),
                'genre_id' => $faker->numberBetween(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('games')->insert($games);

        /*
        for($i = 0; $i < 100; $i++) {
            DB::table('games')->insert([
                'title' => $faker->words($faker->numberBetween(1, 3),true),
                'describe' => $faker->sentence,
                'publisher' => $faker->randomElement(['Atari', 'EA', 'Blizzard', 'Ubosift']),
                'genre_id' => $faker->numberBetween(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        */


    }
}
