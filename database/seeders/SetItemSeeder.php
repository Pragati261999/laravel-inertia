<?php

namespace Database\Seeders;

use App\Models\Colors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\Set;
use App\Models\SetItem;
use App\Models\Size;
use Faker\Factory as Faker;

class SetItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $setIds = Set::pluck('id')->toArray();
        $colorIds = Colors::pluck('id')->toArray();
        $sizeIds = Size::pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            SetItem::create([
                'set_id' => $faker->randomElement($setIds),
                'product_id' => $faker->randomElement($setIds),
                'color_id' => $faker->randomElement($colorIds),
                'size_id' => $faker->randomElement($sizeIds),
            ]);
        }
    }
}
