<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Set;
use Faker\Factory as Faker;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            Set::create([
                'name' => $faker->word,
                'price' => $faker->randomFloat(2, 50, 500),
            ]);
        }
    }
}
