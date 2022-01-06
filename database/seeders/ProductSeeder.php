<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['id' => 1,
            'category_id' => 1,
            'title' => 'Ayam kampung',
            'description' => 'Ayam kampung berkualitas yang dirawat dengan baik, siap potong.',
            'price' => 35000,
            'stock' => 210,
            'image' => 'images/Ayam Kampung.jpeg'],

            ['id' => 2,
            'category_id' => 1,
            'title' => 'Ayam negeri',
            'description' => 'Ayam negeri berkualitas yang dirawat dengan baik, bisa dikembang biakan kembali.',
            'price' => 21500,
            'stock' => 500,
            'image' => 'images/Ayam Negeri.jpg'],

            ['id' => 3,
            'category_id' => 1,
            'title' => 'Sapi pedaging',
            'description' => 'Sapi berkualitas yang berumur 4 - 6 tahun.',
            'price' => 13500000,
            'stock' => 20,
            'image' => 'images/Sapi Pedaging.jpg'],

            ['id' => 4,
            'category_id' => 1,
            'title' => 'Kambing cilik',
            'description' => 'Kambing berkualitas yang berumur 2 - 3 tahun.',
            'price' => 3500000,
            'stock' => 80,
            'image' => 'images/Kambing Cilik.jpg'],

            ['id' => 5,
            'category_id' => 2,
            'title' => 'Susu kambing',
            'description' => 'Susu kambing segar tanpa diolah dan alami.',
            'price' => 10000,
            'stock' => 250,
            'image' => 'images/Susu Kambing.jpg'],

            ['id' => 6,
            'category_id' => 3,
            'title' => 'Telur ayam kampung',
            'description' => 'Telur ayam kampung berkualitas.',
            'price' => 30000,
            'stock' => 340,
            'image' => 'images/Telur ayam kampung.jpg']

        ]);
    }
}
