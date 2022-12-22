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
            $randomNumber = mt_rand(1, 5);
            $randomString = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,4);

            $item = new \App\Models\Item();
            $item->name = $faker->randomElement([
                'Samsung',
                'Iphone',
                'Macbook',
                'Dell',
                'Asus',
                'Lenovo',
                'Acer',
                'Hp',
                'Toshiba',
            ]). '-'. $randomString .'-'. $randomNumber;
            $item->description = $faker->text;
            $item->price = $faker->randomFloat(2, 0, 1000);
            $item->img = $faker->imageUrl($width = 640, $height = 480);
            $item->stock = $faker->randomNumber(2);
            $item->save();
        }
    }
}
