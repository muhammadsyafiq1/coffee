<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        $menus = [];
        $faker = \Faker\Factory::create();
        for($i = 0 ; $i < 1000; $i++){
            $menus[$i] = [
                'name' => $faker->Company(),
                'description' =>$faker->Text(),
                'category_id' => 0,
                'price' => 1000000
            ];
        }
        DB::table('menus')->insert($menus);
    }
}
