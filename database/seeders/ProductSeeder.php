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
            'image' => 'https://i0.wp.com/hewanpedia.com/wp-content/uploads/2019/11/Pakan-Ayam-Kampung.jpeg?fit=1100%2C618&ssl=1'],

            ['id' => 2,
            'category_id' => 1,
            'title' => 'Ayam negeri',
            'description' => 'Ayam negeri berkualitas yang dirawat dengan baik, bisa dikembang biakan kembali.',
            'price' => 21500,
            'stock' => 500,
            'image' => 'https://lh3.googleusercontent.com/JPASickEi4_U2DK9Jh1JZInPHQ_yPiN2YOX_MvIdvwxGZG3C7UuEk6-7KKJURfx0NwyKnsWy6MgQcgFI=w768-h768-n-o-v1'],

            ['id' => 3,
            'category_id' => 1,
            'title' => 'Sapi pedaging',
            'description' => 'Sapi berkualitas yang berumur 4 - 6 tahun.',
            'price' => 13500000,
            'stock' => 20,
            'image' => 'https://s.kaskus.id/r480x480/images/fjb/2016/08/25/sapi_qurban_limosin_free_ongkir_dan_perawatan_jabodetabek_9033998_1472092261.jpg'],

            ['id' => 4,
            'category_id' => 1,
            'title' => 'Kambing cilik',
            'description' => 'Kambing berkualitas yang berumur 2 - 3 tahun.',
            'price' => 3500000,
            'stock' => 80,
            'image' => 'https://www.mongabay.co.id/wp-content/uploads/2021/02/Saburai1.jpg'],

            ['id' => 5,
            'category_id' => 2,
            'title' => 'Susu kambing',
            'description' => 'Susu kambing segar tanpa diolah dan alami.',
            'price' => 10000,
            'stock' => 250,
            'image' => 'https://lh3.googleusercontent.com/OVCaDozm0GrwS5xVf13OHBB2L4WIgAi9k_bxNek7mf6la2mqxa7tEKXBuFRzaTMc7SlyNl6d=w1080-h608-p-no-v0'],

            ['id' => 6,
            'category_id' => 3,
            'title' => 'Telur ayam kampung',
            'description' => 'Telur ayam kampung berkualitas.',
            'price' => 30000,
            'stock' => 340,
            'image' => 'https://1.bp.blogspot.com/-yfA4ZFQjvpQ/Xsfcd-jiEaI/AAAAAAAAG2I/xjOXE9QTSDg4DBQ7K3LmSDsnHIzJObPiwCLcBGAsYHQ/s1600/unnamed.jpg']

        ]);
    }
}
