<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Services::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; ++$i) {
            \App\Models\Services::create([
                'id'    => $faker->id,
                'code'  => $faker->randomDigit,
                'service' => $faker->word,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
