<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['id' => 1, 'category_name' => 'Animal'],
            ['id' => 2, 'category_name' => 'Milk'],
            ['id' => 3, 'category_name' => 'Egg']
        ]);
    }
}
