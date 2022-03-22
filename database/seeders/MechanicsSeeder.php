<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MechanicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Mechanics::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; ++$i) {
            \App\Models\Mechanics::create([
                'id'    => $faker->id,
                'name'  => $faker->name,
                'email' => $faker->freeEmail,
                'service' => $faker->randomDigit,
                'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
