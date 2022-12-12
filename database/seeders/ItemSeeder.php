<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //faker computer items catalog data
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $item = new \App\Models\Item();
            $item->name = $faker->name;
            $item->description = $faker->text;
            $item->price = $faker->randomFloat(2, 0, 1000);
            $item->stock = $faker->randomNumber(2);
            $item->save();
        }
    }
}
