<?php

namespace Database\Seeders;

use App\Models\Colors;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            Colors::create([
                'name' => $faker->word,
            ]);
        }
    }
}
