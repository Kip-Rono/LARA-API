<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SparePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\SparePart::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; ++$i) {
            \App\Models\SparePart::create([
                'id'    => $faker->id,
                'name'  => $faker->word,
                'price' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'make'  => $faker->word,
                'model' => $faker->word,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
