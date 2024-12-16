<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Computer;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 15; $i++) {


            Computer::create([
                'computer_name' => $faker->word . '-' . $i,
                'model' => $faker->word,
                'operating_system' => $faker->randomElement(['Windows 10', 'Linux', 'MacOS']),
                'processor' => $faker->randomElement(['Intel i5', 'Intel i7', 'AMD Ryzen 5']),
                'memory' => $faker->numberBetween(8, 64),
                'available' => $faker->boolean,
            ]);
        }
    }
}
